<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('random_soal');
            $table->string('random_jawaban');
            $table->text('jawaban_siswa');
            $table->integer('user_id');
            $table->integer('jadwal_ujian_id');
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai');
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
        Schema::dropIfExists('ujian_siswas');
    }
}
