<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
              $table->dateTime('deleted_at')->nullable();
            $table->string('email')->unique();    
            $table->string('password');
            $table->string('picture')->default('../av.png');;
            $table->string('header')->default('../header.jpg');
            $table->integer('active')->default(0);
            $table->string('bio')->nullable();;
            $table->string('sex')->nullable();;
            $table->ipAddress('ip')->nullable();;
            $table->string('location')->nullable();;
            $table->dateTime('birthday')->nullable();;
            $table->rememberToken();
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
