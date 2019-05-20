<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketSoal extends Model
{
    protected $fillable = [
        'nama_paket','pelajaran_id'
    ];

    public function Pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }

    public function Soals()
    {
        return $this->hasMany('App\Soal');
    }
}
