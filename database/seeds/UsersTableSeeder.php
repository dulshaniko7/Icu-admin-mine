<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
                'mobile'         => '91 9884079940',
            ],
        ];

        User::insert($users);

        User::where('id', 1)->update([
            'country_id' => 95
        ]);
    }
}
