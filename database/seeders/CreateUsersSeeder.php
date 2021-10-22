<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@abyssmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('akoito00'),
            ],
            [
               'name'=>'User',
               'email'=>'user@abyssmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('akoito00'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
