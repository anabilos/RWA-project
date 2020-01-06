<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
             'name' => 'Ana',
             'surname' => 'Bilos',
             'phone' => '0000000',
             'role' => 1,
             'email' => 'anabilos203@gmail.com',
             'password' =>bcrypt('lozinka5'),
         ]);
}
}
