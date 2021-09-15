<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // $table->string('busstype_id');
            $table->string('qset_id');
            // $table->integer('qid');
            $table->double('m_p_mult')->nullable();
            $table->double('m_n_mult')->nullable();
            $table->double('q_dat_1')->nullable();
            $table->double('q_dat_2')->nullable();
            $table->double('q_dat_3')->nullable();
            $table->boolean('isFree')->default(0);
            $table->boolean('isGlobal')->default(false);
            $table->integer('type');
            $table->string('inputType')->nullable();
            $table->string('typeStyle')->nullable();
            $table->double('minValTextValue')->nullable();
            $table->string('minValTextWarning')->nullable();
            $table->double('maxValTextValue')->nullable();
            $table->string('maxValTextWarning')->nullable();
            $table->longText('q_info')->nullable();
            $table->longText('popUnderComment')->nullable();
            $table->boolean('unSureSkip')->default(0);
            $table->double('free_index')->default(999);
            $table->timestamps();
        });

        /*Question types 'type'
            1. Select answer
            2. Text input
            3. multi select
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
