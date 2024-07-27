<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Account;
use App\Models\Card;
use App\Models\Transaction;
use Illuminate\Support\Facades\Config;

class BankSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            [
                'id' => 1,
                'name' => 'سپه',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'کشاورزی',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'name' => 'ملی',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'name' => 'پاسارگاد',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'name' => 'ملت',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);

        //our_system_bank_account
        DB::table('accounts')->insert([
            [
                'account_no' => Config::get('constant.system_bank_account'),
                'bank_id' => 1,
                'user_id' => 1,
                'balance' => 0
            ]
        ]);

        User::factory()
        ->count(50)
        ->create();

        Account::factory()
        ->count(50)
        ->create();

        Card::factory()
        ->count(50)
        ->create();

        Transaction::factory()
        ->count(10)
        ->create();

    }
}
