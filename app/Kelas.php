<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
     protected $fillable = [
        'nama_kelas',
    ];

    public function User()
    {
        return $this->belongsToMany(User::class, 'user_kelas');
    }
}
