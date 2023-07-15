<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      collect([
        [
         'name' => 'Nama Pimpinan',
         'username' => 'pimpinan',
         'password' => 'password',
         'role' => 'pimpinan',
        ],
        [
         'name' => 'Nama Staff',
         'username' => 'staff',
         'password' => 'password',
         'role' => 'staff',
        ],
        [
         'name' => 'Nama Admin',
         'username' => 'admin',
         'password' => 'password',
         'role' => 'admin',
        ],
       ])->each(function($user){
         User::create($user);
     });
    }
}
