<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_prices', function (Blueprint $table) {
            $table->bigInteger('id', true, false);
            $table->float('price')->default(null);
            $table->string('from_date')->default(null)->nullable();
            $table->string('to_date')->default(null)->nullable();
            $table->enum('enable', [true, false])->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_prices');
    }
}
