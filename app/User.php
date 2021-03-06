<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password','role','name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isGuru()
    {
        return $this->role == 'guru';
    }

    public function isSiswa()
    {
        return $this->role == 'siswa';
    }

    public function Kelas()
    {
        return $this->belongsToMany(Kelas::class, 'user_kelas');
    }

    public function UjianSiswa()
    {
        return $this->hasMany('App\UjianSiswa');
    }
}
