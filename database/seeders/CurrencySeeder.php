<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\CurrencyPrice;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        $currencyPrices = CurrencyPrice::all()->pluck('id')->toArray();
        $data = [
            [
                'currency_price_id' => $faker->randomElement($currencyPrices),
                'name' => 'ریال',
                'descriptor' => 'IR_RIAL',
                'sign' => '﷼',
                'enable' => true,
            ],
            [
                'currency_price_id' => $faker->randomElement($currencyPrices),
                'name' => 'دلار',
                'descriptor' => 'US_DOLLAR',
                'sign' => '$',
                'enable' => true,
            ],
            [
                'currency_price_id' => $faker->randomElement($currencyPrices),
                'name' => 'یورو',
                'descriptor' => 'EURO',
                'sign' => '€',
                'enable' => true,
            ],
        ];

        foreach ($data as $value) {
            Currency::create($value);
        }
    }
}
