<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('practicum_id');
            $table->string('name');
            $table->integer('percentage');
            $table->integer('duration');
            $table->integer('question_count');
            $table->char('answer_type', 5);
            $table->char('isSoftFileQuestion', 5)->default('OPTNO');
            $table->char('isOnline', 5)->default('OPTNO');
            $table->timestamps();

            $table->foreign('practicum_id')->references('id')->on('practicums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
