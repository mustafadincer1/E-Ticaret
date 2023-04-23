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
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            // $table->enum('show_slider', ['onaylandi', 'onaylanmadi'])->default('onaylanmadi');
            // $table->enum('show_opportunity', ['onaylandi', 'onaylanmadi'])->default('onaylanmadi');
            // $table->enum('show_featured', ['onaylandi', 'onaylanmadi'])->default('onaylanmadi');
            // $table->enum('show_bestseller', ['onaylandi', 'onaylanmadi'])->default('onaylanmadi');
            // $table->enum('show_discount', ['onaylandi', 'onaylanmadi'])->default('onaylanmadi');
            $table->boolean('show_slider');
            $table->boolean('show_opportunity');
            $table->boolean('show_featured');
            $table->boolean('show_bestseller');
            $table->boolean('show_discount');
            $table->string('ürün_resmi',50)->nullable();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail');
    }
};
