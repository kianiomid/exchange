<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_orders', function (Blueprint $table) {
            $table->bigInteger('id', true, false);

            $table->bigInteger('user_id')->index()->nullable();
            $table->foreign('user_id', 'user_id_to_tracking_orders')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->bigInteger('order_id')->index()->nullable();
            $table->foreign('order_id', 'order_id_to_tracking_orders')
                ->references('id')->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('tracking_code');

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
        Schema::dropIfExists('tracking_orders');
    }
}
