<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCovidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_covids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama');
            $table->string('umur');
            $table->string('gender');
            $table->string('nik');
            $table->string('telepon');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('alamat');
            $table->string('gejala')->nullable();
            $table->timestamps();

            
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_covid');
    }
}
