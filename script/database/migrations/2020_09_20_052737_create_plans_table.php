<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->integer('days');
            $table->integer('product_limit');
            $table->double('storage');
            $table->integer('customer_limit')->default(0);
            $table->integer('category_limit')->default(0);
            $table->integer('location_limit')->default(0);
            $table->integer('brand_limit')->default(0);
            $table->integer('variation_limit')->default(0);
           
            $table->integer('status')->default(0);
            $table->integer('custom_domain')->default(0);
            $table->integer('featured')->default(0);
            $table->integer('is_default')->default(0);
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
        Schema::dropIfExists('plans');
    }
}
