<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigInteger('id', true, false);

            $table->bigInteger('currency_price_id')->index()->nullable();
            $table->foreign('currency_price_id', 'currency_price_id_to_currencies')
                ->references('id')->on('currency_prices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('name')->default(null);
            $table->string('descriptor')->default(null);
            $table->string('sign')->default(null);
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
        Schema::dropIfExists('currencies');
    }
}
