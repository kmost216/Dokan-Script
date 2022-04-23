<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userplans', function (Blueprint $table) {
            $table->id();

            $table->string('order_no')->nullable();
            $table->double('amount')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plan_id');

            $table->unsignedBigInteger('trasection_id')->nullable();
            $table->integer('status')->default(2);
            $table->integer('payment_status')->default(2);
            $table->date('will_expired');
            
            
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade'); 

            $table->foreign('plan_id')
            ->references('id')->on('plans')
            ->onDelete('cascade'); 
           
            $table->foreign('trasection_id')
            ->references('id')->on('trasections')
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
        Schema::dropIfExists('userplans');
    }
}
