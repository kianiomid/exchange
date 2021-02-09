<?php

namespace Database\Factories;

use App\Models\CurrencyPrice;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyPriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrencyPrice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'price' => rand(100, 1000000),
            'from_date' => Carbon::now()->toDateString(),
            'to_date' => Carbon::now()->toDateString(),
            'enable' => true,

        ];
    }
}
