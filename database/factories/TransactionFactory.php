<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Card;
use Illuminate\Support\Facades\Config;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->unique()->creditCardNumber();
        $wage = Config::get('constants.wage');

        return [
            'price' => $price,
            'total_price' => $price + $wage,
            'payer_no' => Card::all()->random()->card_no,
            'payee_no' => Card::all()->random()->card_no,
        ];
    }
}
