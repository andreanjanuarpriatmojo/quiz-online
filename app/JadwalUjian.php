<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalUjian extends Model
{
    protected $fillable = [
        'nama_ujian','pelajaran_id','paket_soal_id','waktu_mulai','waktu_selesai'
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
}
