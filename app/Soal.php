<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = [
        'paket_soal_id','deskripsi_soal', 'pilihan_1', 'pilihan_2', 'pilihan_3', 'pilihan_4', 'jawaban'
    ];

     public function PaketSoal()
    {
        return $this->belongsTo('App\PaketSoal');
    }
}
