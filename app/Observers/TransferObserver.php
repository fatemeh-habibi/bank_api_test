<?php

namespace App\Observers;

use App\Models\Transaction;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class TransferObserver
{
    /**
     * Handle the Transaction "created" event.
     *
     * @param  \App\Models\Transaction  $tarnsaction
     * @return void
     */
    public function created(Transaction $tarnsaction)
    {
        // Mail::to(env('MAIL_TO_ADDRESS', 'fatemeh.habibi27@gmail.com'))->send(new SendEmail($transaction));

        // $payer_number = "09123703808";
        // $payee_number = "09123703808";
        // $price = $tarnsaction->price;
        // $payee_message = "از حساب شما ".$price." تومان کسر شد.";
        // $payee_message = "به حساب شما ".$price." تومان اضافه شد.";
        // $items = [
        //     [
        //         'message' => $payee_message,
        //         'number' => $payer_number
        //     ],
        //     [
        //         'message' => $payee_message,
        //         'number' => $payee_number
        //     ],
        // ];

        // SmsPanel::send($items);
    }
}
