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
           'first_name' => 'Ibrahim ',
           'last_name' => 'Bala',
           'email' => 'ibro@gmail.com',
           'email_verified_at' => null,
           'password' => Hash::make('password'),
           'role_id' => 2,
           'country' => 'NG',
           'created_at' => now(),
           'updated_at' => now()

       ]);
    }
}
