<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $fillable = [
        'nama_pelajaran'
    ];

    public function PaketSoals()
    {
        return $this->hasMany('App\PaketSoal');
    }
}
