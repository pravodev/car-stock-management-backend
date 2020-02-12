<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'username' => 'administrator',
            'password' => bcrypt('rahasia')
        ]);
    }
}
