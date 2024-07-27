<?php

namespace App\Http\Controllers\V1;

use App\Helpers\ApiResponseTrait;
use App\Helpers\Grid;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bank;
use App\Models\Card;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FilterQueryBuilder;
use App\Http\Requests\TransferRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    use ApiResponseTrait,Grid;
    private $system_account;

    public function __construct()
    {
        $this->system_account = Account::find(Config::get('constant.system_bank_account'));
    } 

    /**
     * @OA\Get(
     * path="/api/v1/bank/list",
     * tags={"bank"},
     * summary="bank_list",
     * operationId="bank_list",
     * 
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\MediaType(
     *      mediaType="application/json",
     *    )
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthenticated"),
     *    )
     * )
     * )
     */
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function banks(Request $request)
    {
        $banks = Bank::all();
        return $this->apiResponse([
            'success' => true,
            'result' => $banks ?? []
        ]);
    }

    /**
     * @OA\Get(
     * path="/api/v1/card/list",
     * tags={"bank"},
     * summary="card_list",
     * operationId="card_list",
     * 
     * @OA\Parameter(
     *  name="bank_id",
     *  in="query",
     *  required=false,
     *  @OA\Items(
     *   type="integer",
     *  ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\MediaType(
     *      mediaType="application/json",
     *    )
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when user is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Unauthenticated"),
     *    )
     * )
     * )
     */
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function cards(Request $request)
    {
        $cards = Card::where('activated',1);
        $bankID = $request->bank_id;
        if(isset($bankID) && !empty($bankID)){
            $cards = $cards->with('account', function (Builder $query) use ($bankID) {
                            $query->where('bank_id', $bankID);
                        });
        }

        $cards = $cards->get()->map(function($item){
            return [
                'number' => $item->card_no,
                // 'user_full_name' => $item->accountUser ? $item->accountUser->full_name : '',
                // 'bank_name' => $item->accountBank ? $item->accountBank->name : '',
                'account_no' => $item->account_no,
                'activated' => $item->activated,
            ];
        });

        return $this->apiResponse([
            'success' => true,
            'result' => $cards ?? []
        ]);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/user/list",
     *   tags={"user"},
     *   summary="user_list",
     *   operationId="user_list",
     *   security={ {"bearerAuth":{}}},
     *
     *   @OA\Parameter(
     *      name="skip",
     *      in="query",
     *      required=false,
     *      example=0,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="take",
     *      in="query",
     *      required=false,
     *      example=10,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="sort",
     *      in="query",
     *      required=false,
     *      @OA\Items(
     *          type="array",
     *          @OA\Items()
     *      ),
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *)
     **/
    public function users(FilterQueryBuilder $filters, Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'skip' => 'integer',
            'take' => 'integer',
        ]);

        $users_grid_attach_data = array(
            'name' => 'users',
            'title' => 'users'
        );

        $users_grid_config = array();
        $alias = [];
        $now = now();

        $users = $filters->buildQuery(User::loadRelations(), $alias);
        $users = $users->whereHas('last_transactions');
                        
        $total_users = $users->count;
        $users = $users->get();

        $data_only_items = array('id','username','mobile','last_transactions','email','first_name','last_name','activated','created_at');
                
        $users_data = $users->map(function ($item, $key) use ($data_only_items) {
            return [
                'user_full_name' => $item->full_name,
                'transactions' => $item->last_transactions,
            ];
            // return collect($item)->only($data_only_items)->toArray();
        });
        
        return $this->setGrid($users_data,$total_users,[],'users',$users_grid_attach_data,$users_grid_config);
    }

    /**
     * @OA\Post(
     ** path="/api/v1/transfer",
     *   tags={"transfer"},
     *   summary="transfer_store",
     *   operationId="transferStore",
     *   security={ {"bearerAuth":{}}},
     *
     *   @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *      @OA\Property(property="payer_no", type="integer", example=1),
     *      @OA\Property(property="payee_no", type="integer", example=1),
     *      @OA\Property(property="price", type="integer", example=1),
     *     )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *)
     **/
    /**
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function transfer(TransferRequest $request)
    {
        $payer_card = Card::with('account')->where('card_no',$request->payer_no)->first();
        $payee_card = Card::where('card_no',$request->payee_no)->first();

        if($payer_card && $payer_card->account->balance > $request->price){

        }else{
            return $this->respondError(__('messages.balance_less_than_price'));
        }
        $request->status = "Completed";
        $request = $request->all();
        // DB::beginTransaction();
        // try
        // {
            $wage = Config::get('constant.wage');
            $decrement_price = $request['price'] + $wage;

            $transfer = Transaction::create($request);
            $payer_card->account()->decrement('balance',$decrement_price);
            $payee_card->account()->increment('balance',$request['price']);
            $this->system_account->increment('balance',$wage);

            // DB::commit();
                return $this->apiResponse(
                [
                    'success' => true,
                    'result' => $transfer,
                    'message' => __('messages.request_created_success')
                ]
            );
        // }catch (\Exception $e){
        //     DB::rollBack();
        //     return $this->respondError(__('messages.transfer_created_unsuccess'));
        // }
    }


}
