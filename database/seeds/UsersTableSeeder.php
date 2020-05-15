<?php

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
        App\User::create([
            'name' => 'teplo',
            'avatar' => asset('images/avatars/admin.jpg'),
            'email' => 'kalva@obninsk.ru',
            'theusers' => 1,
            'password' => bcrypt('teploset')
        ]);

        App\User::create([
            'name' => 'pen07',
            'avatar' => asset('images/avatars/admin.jpg'),
            'email' => 'pen07@obninsk.ru',
            'theusers' => 1,
            'password' => bcrypt('1607pe')
        ]);
    }
}
