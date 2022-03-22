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
        Schema::create('reservation_has_product', function (Blueprint $table) {
            $table->increments('reservation_has_product_id');
            $table->double('amount', 6, 2);
            $table->date('pickup_date');
            $table->foreignId('fk_product_id');
            $table->foreignId('fk_reservation_id');
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
        Schema::dropIfExists('reservation_has_products');
    }
};
