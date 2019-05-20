<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pelajaran;
use App\PaketSoal;
use App\Soal;
use App\UserKelas;
use App\Kelas;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = 'admin';
        $user->password = bcrypt('admin');
        $user->role = 'admin';
        $user->name = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'guru';
        $user->password = bcrypt('guru');
        $user->role = 'guru';
        $user->name = 'guru';
        $user->save();

        $kelas = new Kelas;
        $kelas->nama_kelas = 'Kelas Dasar Pemrograman A';
        $kelas->save();

        for ($i=1; $i <= 5 ; $i++) 
        { 
            $user = new User;
            $user->username = 'siswa'.$i;
            $user->password = bcrypt('siswa'.$i);
            $user->role = 'siswa';
            $user->name = 'siswa'.$i;
            $user->save();

            $user_kelas = new UserKelas;
            $user_kelas->user_id = $user->id;
            $user_kelas->kelas_id = $kelas->id;
            $user_kelas->save();
        }

        $pelajaran = new Pelajaran;
        $pelajaran->nama_pelajaran = 'Dasar Pemrograman';
        $pelajaran->save();

        $paket = new PaketSoal;
        $paket->nama_paket = 'UAS Dasar Pemrograman';
        $paket->pelajaran_id = $pelajaran->id;
        $paket->save();

        for ($i=1; $i <= 5; $i++) 
        {
            $soal = new Soal;
            $soal->paket_soal_id = $paket->id;
            $soal->deskripsi_soal = '<p>Contoh Soal Nomor '.$i.'</p>';
            $soal->pilihan_1 = '<p>Contoh pilihan A</p>';
            $soal->pilihan_2 = '<p>Contoh pilihan B</p>';
            $soal->pilihan_3 = '<p>Contoh pilihan C</p>';
            $soal->pilihan_4 = '<p>Contoh pilihan D</p>';
            $soal->jawaban = ($i % 4)+1;
            $soal->save();
        }
    }
}
