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
        Schema::create('reservation_has_products', function (Blueprint $table) {
            $table->id();
            $table->double('amount', 6, 2);
            $table->date('pickup_date');
            $table->foreignId('product_id');
            $table->foreignId('reservation_id');
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
