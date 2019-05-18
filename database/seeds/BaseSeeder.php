<?php

use Illuminate\Database\Seeder;
use App\User;

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

        $user = new User;
        $user->username = 'siswa';
        $user->password = bcrypt('siswa');
        $user->role = 'siswa';
        $user->name = 'siswa';
        $user->save();
    }
}
