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
            $table->increments('product_id');
            $table->string('name', 40);
            $table->double('stock_quantity', 6, 2);
            $table->text('description');
            $table->enum('product_hint', ['', 'vegan', 'vegetarian']);
            $table->string('image', 30);
            $table->decimal('price', 8, 2);
            $table->foreign('fk_user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fk_sub_category_id')->references('sub_category_id')->on('sub_category')->onUpdate('cascade')->onDelete('cascade');
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
