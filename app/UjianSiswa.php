<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UjianSiswa extends Model
{
    protected $fillable = ['id', 'random_soal', 'random_jawaban', 'jawaban_siswa', 'user_id', 'jadwal_ujian_id', 'waktu_mulai', 'waktu_selesai'];
    public $incrementing = false;
    protected $dates = ['waktu_mulai', 'waktu_selesai'];

    public function JadwalUjian()
    {
        return $this->belongsTo('App\JadwalUjian');
    }
}
