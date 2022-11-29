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
        Schema::create('mentor', function (Blueprint $table) {
            $table->id('id_mentor');
            $table->foreignId('id_user');
            $table->foreignId('id_bidang');
            $table->string('kode_mentor', 10);
            $table->string('nama_member', 30);
            $table->date('tgl_lhr');
            $table->string('foto', 20);
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->string('alamat', 70);
            $table->string('email', 30);
            $table->string('telepon', 14);
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('user')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mentor');
    }
};
