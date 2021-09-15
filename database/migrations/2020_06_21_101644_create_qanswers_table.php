<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qanswers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('name')->unique()->nullable();
            $table->string('qSetId');
            $table->string('question_id');
            $table->longText('info')->nullable();
            $table->string('userInput')->nullable();
            $table->string('toolInput')->nullable();
            $table->double('grade')->nullable()->default(null);
            $table->double('impact')->nullable()->default(null);
            $table->double('sellability')->nullable()->default(null);
            $table->double('dat1')->nullable()->default(null);
            $table->double('dat2')->nullable()->default(null);
            $table->double('dat3')->nullable()->default(null);
            $table->double('dat4')->nullable()->default(null);
            // $table->integer('valEffect');
            $table->double('add')->nullable();
            $table->double('subtract')->nullable();
            $table->boolean('redFlag')->nullable();
            $table->boolean('yellowFlag')->nullable();
            $table->boolean('greenFlag')->nullable();
            $table->boolean('purpleFlag')->nullable();
            $table->boolean('blackFlag')->nullable();
            $table->longText('popUnderComment')->nullable();
            $table->longText('sectionSummary')->nullable();
            $table->longText('confidenceImpactScore')->nullable();
            $table->longText('analysisReportComment')->nullable();
            $table->longText('valScoreImpactComment')->nullable();
            $table->longText('confidenceImpactScoreComment')->nullable();
            $table->string('featured')->nullable();
            // $table->integer('position');
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
        Schema::dropIfExists('qanswers');
    }
}
