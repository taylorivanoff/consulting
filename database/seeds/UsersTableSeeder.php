<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Taylor Ivanoff',
            'email' => 'taylorivanoff@gmail.com',
            'password' => Hash::make('8g48b8p8fR'),
        ]);
    }
}
