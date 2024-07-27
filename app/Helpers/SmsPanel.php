<?php

namespace App\Helpers;
use kavenegar;
use ghasedak;
use App\Models\Notification;

class SmsPanel
{
	private $provider;
	const KAVENEGAR = 'kavenegar';
	const GHASEDAK = 'gahsedak';

    public function __construct(){}

	private function resolve($provider)
	{
		switch($provider){
			case KAVENEGAR :
				$this->provider = new Kavenegar();
				$this->provider_send = kaveneagr_send;
				breake;
			case GHASEDAK :
				$this->provider = new GhasedakApi(config('sms.ghasedak.API_KEY'));
				$this->provider_send = ghasedak_send;
				breake;
			default:
				$this->provider = new kavenegar();
		}
	}

	private function message($message)
	{
		$body = "انتفال وجه";
		$body .= "/n". $message ."\n";
		$body .= "بانک  ایران";

		return $body;
	}

	public static function send($items, $provider = self::KAVENEGAR)
	{
		if(empty($items)){
            return $this->respondError(__('messages.item_not_found'));
		}

		self::resolve($provider);

		foreach($items as $item){
			$message = self::message($item->message);
			$mobile = $item->number;
			$item->result = $this->provider_send($message,$mobile);
		}

		$line_number = config('sms.'.$provider.'.line-number');
		self::DBlog($items, $provider, $line_number);

		return json_decode($result->getStatus(),true);
	}

	/**
	 * This method used for log the messages to the database if db-log set to true (@ SmsPanelV2.php in config folder).
	 *
	 * @param $result
	 * @param $messages
	 * @param $numbers
	 * @internal param bool $addToCustomerClub | set to true if you want to log another message instead main message
	 */
	public static function DBlog($items, $provider, $line_number) {
		if(config('sms.db')) {
			foreach ( $items as $item ) {
				$log = Notification::create( [
					'response' => $item->result ? $item->result->Message : '',
					'provider' => $provider,
					'message_sms'  => $item->message,
					'status'   => $item->result ? $item->result->Status : 0,
					'from'     => $line_number,
					'to'       => $item->number,
				]);
			}
		}
	}

	private function kaveneagr_send($message,$mobile)
	{
		try{
			$sender = config('sms.kavenegar.line-number');
			$message = "خدمات پیام کوتاه کاوه نگار" ."/n". $message;
			$receptor = [$mobile];
			$result = $this->provider->Send($sender,$receptor,$message);
			if($result){
				return $result;
				// foreach($result as $r){
				// 	echo "messageid = $r->messageid";
				// 	echo "message = $r->message";
				// 	echo "status = $r->status";
				// 	echo "statustext = $r->statustext";
				// 	echo "sender = $r->sender";
				// 	echo "receptor = $r->receptor";
				// 	echo "date = $r->date";
				// 	echo "cost = $r->cost";
				// }       
			}
		}
		catch(\Kavenegar\Exceptions\ApiException $e){
			// در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
			echo $e->errorMessage();
		}
		catch(\Kavenegar\Exceptions\HttpException $e){
			// در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
			echo $e->errorMessage();
		}
	}

	private function ghasedak_send($message,$mobile)
	{
		$this->provider->SendSimple($mobile,$message,config('sms.ghasedak.line-number'));
		// [
		// "09xxxxxxxxx",  // receptor
		// "Hello World!", // message
		// "3000xxxxx"    // choose a line number from your account
		// ]
	}

}
