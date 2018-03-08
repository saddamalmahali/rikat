<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Admin Aplikasi";
        $user->username = "admin";
        $user->email = "admin@rikat.id";
        $user->confirmed = 1;
        $user->password = bcrypt('admin');
        $user->admin = true;
        $user->save();
    }
}
