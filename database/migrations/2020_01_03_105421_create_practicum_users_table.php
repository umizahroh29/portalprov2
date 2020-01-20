<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticumUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicum_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('practicum_id');
            $table->integer('user_nim');
            $table->char('assistant_code', 3)->nullable();
            $table->char('role', 5);
            $table->timestamps();

            $table->foreign('practicum_id')->references('id')->on('practicums');
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
        Schema::dropIfExists('practicum_users');
    }
}
