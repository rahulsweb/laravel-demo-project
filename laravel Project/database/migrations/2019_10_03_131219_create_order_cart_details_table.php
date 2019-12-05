<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cart_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_payment_detail_id')->unsigned();
            $table->foreign('order_payment_detail_id')->references('id')->on('order_payment_details')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('qty');

            $table->string('rate');

            $table->string('total');
            $table->softDeletes();
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
        Schema::dropIfExists('order_cart_details');
    }
}
