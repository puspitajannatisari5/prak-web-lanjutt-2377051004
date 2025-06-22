<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npm');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();
            
            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}