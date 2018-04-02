<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('images');
            $table->integer('cat_id');
            $table->string('content');
            $table->float('price');
            $table->float('price_sale');
            $table->tinyInteger('status');
            $table->string('slug');
            $table->string('images_hover1');
            $table->string('images_hover2');
            $table->string('images_hover3');
            $table->string('images_hover4');
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
}
