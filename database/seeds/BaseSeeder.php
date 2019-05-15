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
    }
}
