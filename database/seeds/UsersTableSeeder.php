<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $params = [

            [
                'name' => 'Gerente teste',
                'email' => 'gerente@zaptrade.com.br',
                'password' => Hash::make('123456'),
                'profile_id' => 1
            ],
            [
                'name' => 'Vendedor teste',
                'email' => 'vendedor@zaptrade.com.br',
                'password' => Hash::make('123456'),
                'profile_id' => 2
            ]

        ];

        User::insert($params);

    }

}
