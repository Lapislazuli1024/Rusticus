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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->double('stock_quantity', 6, 2);
            $table->text('description');
            $table->enum('product_hint', ['neither', 'vegan', 'vegetarian']);
            $table->string('image');
            $table->decimal('price', 8, 2);
            $table->foreignId('user_id');
            $table->foreignId('sub_category_id');
            $table->foreignId('unit_of_measure_id');
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
        Schema::dropIfExists('products');
    }
};
