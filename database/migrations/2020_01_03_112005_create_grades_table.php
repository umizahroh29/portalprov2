<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('module_assessment_id');
            $table->integer('user_nim');
            $table->char('assistant_code', 3);
            $table->text('answer')->nullable();
            $table->string('answer_file')->nullable();
            $table->string('token')->nullable();
            $table->decimal('grade')->nullable();
            $table->timestamps();

            $table->foreign('module_assessment_id')->references('id')->on('module_assessments');
            $table->foreign('user_nim')->references('nim')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
