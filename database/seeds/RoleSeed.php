<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'admin']);

        $client = Role::create(['name'=>'client']);

        $userAdmin = User::find(1);
        $userAdmin->assignRole('admin');
    }
}
