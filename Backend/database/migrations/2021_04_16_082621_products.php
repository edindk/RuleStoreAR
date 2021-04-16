<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('productId');
            $table->string('type');
            $table->string('itemNumber');
            $table->string('model');
            $table->integer('height');
            $table->integer('depth');
            $table->integer('width');
            $table->integer('outletHeight');
            $table->decimal('volume');
            $table->decimal('contents');
            $table->integer('bottomConeSlope');
            $table->boolean('supplyAir');
            $table->decimal('price');
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
}
