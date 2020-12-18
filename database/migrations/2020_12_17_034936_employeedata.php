<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employeedata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeedata', function (Blueprint $table) {
        $table->bigIncrements('id');
      $table->string('First_Name');
      $table->string('Last_Name');
      $table->string('Email');
      $table->string('password');
      $table->date('Date_of_birth');
      $table->date('Date_of_joining');
      $table->String('Salary');
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
        Schema::dropIfExists('employeedata');
    }
}
