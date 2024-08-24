<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_users');
            $table->string('nama');
            $table->string('alamat_ktp');
            $table->string('alamat_sekarang');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->bigInteger('no_hp');
            $table->string('email');
            $table->string('kewarganegaraan');
            $table->string('negara_wna')->nullable();
            $table->string('tempat_lahir');
            $table->string('tempat_lahir_wna')->nullable();
            $table->date('tanggal_lahir');
            $table->string('provinsi_lahir');
            $table->string('kabupaten_lahir');
            $table->string('jenis_kelamin');
            $table->string('status_menikah');
            $table->string('agama');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulir');
    }
};