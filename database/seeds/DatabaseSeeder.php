<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeed::class);
        $this->call(RoleSeed::class);
        // factory(App\User::class, 1000)->create();
        // factory(App\Kategori::class, 100)->create();

    }
}
