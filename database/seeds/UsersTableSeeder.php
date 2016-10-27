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
        $user = new User;
        $user->name = 'Dylan Schirino';
        $user->email = 'dylan@schirino.be';
        $user->password = bcrypt('password');
        $user->save();

    }
}
