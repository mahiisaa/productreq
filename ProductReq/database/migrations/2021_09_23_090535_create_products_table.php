<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->timestamps();
            $table->string('slug',100);
            $table->string('title',100);
            $table->text('description');
            $table->integer('color_id')->default(1);
            $table->integer('user_id');
            $table->integer('category_id')->default(1);
            $table->integer('brand_id')->default(1);
            $table->integer('model_id')->default(1); 
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
