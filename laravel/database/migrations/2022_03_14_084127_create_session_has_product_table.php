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
            $table->foreignId('fk_sessioncart_id');
            $table->foreignId('fk_product_id');
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
