<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JadwalUjian extends Model
{
    protected $fillable = [
        'nama_ujian','pelajaran_id','paket_soal_id','waktu_mulai','waktu_selesai'
    ];

    protected $dates = [
        'waktu_mulai', 'waktu_selesai'
    ];

    public function Pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }

    public function PaketSoal()
    {
        return $this->belongsTo('App\PaketSoal');
    }

    public function KelasPeserta()
    {
        return $this->belongsToMany(Kelas::class, 'ujian_kelas');
    }

    public function UjianSiswas()
    {
        return $this->hasMany('App\UjianSiswa');
    }

    public function ujianIsRunning()
    {
        $now = Carbon::now('WIB');
        return $this->waktu_mulai < $now && $this->waktu_selesai > $now;
    }
}
