<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionQASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_q_a_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('transaction_id');
            $table->integer('question_id');
            $table->integer('qanswer_id')->nullable();
            $table->double('inputVal')->nullable();
            // $table->text('inputValArray')->nullable();
            $table->json('inputValArray')->nullable();
            $table->json('checkBox')->nullable();
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
        Schema::dropIfExists('transaction_q_a_s');
    }
}
