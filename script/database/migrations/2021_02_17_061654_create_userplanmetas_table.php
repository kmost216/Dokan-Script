<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserplanmetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userplanmetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->integer('product_limit')->default(0);
            $table->double('storage')->nullable();
            $table->integer('customer_limit')->default(0);
            $table->integer('category_limit')->default(0);
            $table->integer('location_limit')->default(0);
            $table->integer('brand_limit')->default(0);
            $table->integer('variation_limit')->default(0);
            

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userplanmetas');
    }
}
