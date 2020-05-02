<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->integer('fk_user_id')->unsigned();
              $table->string('name',100)->nullable();
              $table->integer('age')->nullable()->unsigned();
              $table->integer('salary')->nullable()->unsigned();
              $table->string('gender',10)->nullable();
              $table->year('birth_year')->nullable();
              $table->enum('role', ['a', 'na'])->default('na');
              $table->string('image',50)->nullable();
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
       
            Schema::dropIfExists('users');

       
    }
}
