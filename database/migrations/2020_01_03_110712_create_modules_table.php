<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('practicum_id');
            $table->string('name');
            $table->string('module_link')->nullable();
            $table->string('video_link')->nullable();
            $table->dateTime('input_grade_duedate');
            $table->dateTime('grade_publish_date');
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
        Schema::dropIfExists('modules');
    }
}
