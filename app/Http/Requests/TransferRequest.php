<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Config;

class TransferRequest extends FormRequest
{
    /**
     * @var mixed|string[]
     */
    private $rules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $min_price = Config::get('constants.min_price');
        $max_price = Config::get('constants.max_price');

        return [
            'payer_no' => 'required|numeric|exists:cards,card_no',//regex:[0-9]{16} |exists:cards,card_no
            'payee_no' => 'required|numeric|exists:cards,card_no',
            'price' => 'required|numeric|between:1000,50000000',
            // 'price' => 'required|numeric|between:'. $min_price .','. $max_price ."'",
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'price' => Helper::to_english_numbers($this->input('price'))
        ]);
    }
}
