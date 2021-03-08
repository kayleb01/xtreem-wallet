<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
           'name' => 'Ibrahim Emmanuel',
           'email' => 'ibro@gmail.com',
           'email_verified_at' => null,
           'password' => Hash::make('password'),
           'role_id' => 2,
           'country' => 'Ghana',
           'created_at' => now(),
           'updated_at' => now()

       ]);
    }
}
