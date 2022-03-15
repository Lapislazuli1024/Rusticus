<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_has_product', function (Blueprint $table) {
            $table->increments('session_has_product_id');
            $table->double('amount', 6, 2);
            $table->foreign('fk_sessioncart_id')->references('sessioncart_id')->on('sessioncart')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('session_has_product');
    }
};
