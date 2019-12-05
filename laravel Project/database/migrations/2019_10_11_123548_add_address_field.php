<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->integer('billing_id')->unsigned()->after('user_id');
            $table->foreign('billing_id')->references('id')->on('addresses')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('shipping_id')->unsigned();
            $table->foreign('shipping_id')->references('id')->on('addresses')->onDelete('CASCADE')->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
