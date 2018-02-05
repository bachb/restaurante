<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Alexi Digital-Bit',
            'email' => 'digitalbit-admin@correo.com',
            'password' => bcrypt('123456'),
            'admin' => true
        ]);
        User::create([
            'name' => 'Al2',
            'email' => 'digitalbit-user@correo.com',
            'password' => bcrypt('123456')
        ]);
    }
}
