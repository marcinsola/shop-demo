<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->foreign('cart_id')
                ->references('id')
                ->on('carts');

            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    public function down()
    {
        Schema::table('cart_product', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'cart_id']);
        });

        Schema::dropIfExists('cart_product');
    }
}
