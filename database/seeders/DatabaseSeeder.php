<?php

namespace Database\Seeders;

use App\Models\CurrencyPrice;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        CurrencyPrice::factory(3)->create();

         $this->call(CurrencySeeder::class);
    }
}
