<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusstypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busstypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('initial');
            $table->boolean('isActive');
            $table->longText('info')->nullable();
            $table->string('userInput')->nullable();
            $table->string('toolInput')->nullable();
            $table->double('grade')->nullable()->default(null);
            $table->double('impact')->nullable()->default(null);
            $table->double('sellability')->nullable()->default(null);
            $table->string('featured')->nullable();
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
        Schema::dropIfExists('busstypes');
    }
}
