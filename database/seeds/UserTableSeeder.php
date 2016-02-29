<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => str_random(10),
            'email' => 'toto@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
