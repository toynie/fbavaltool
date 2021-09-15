<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusstypeQuestion extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busstype_question', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('busstype_id');
            $table->string('question_id');
            $table->string('questionQid')->nullable();
            $table->boolean('useCustomAnswer')->default(false);
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
        Schema::dropIfExists('busstype_question');
    }
}
