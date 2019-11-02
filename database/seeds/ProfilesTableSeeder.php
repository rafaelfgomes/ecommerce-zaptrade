<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $params = [

            [ 'name' => 'Gerente' ],
            [ 'name' => 'Vendedor' ]

         ];

         Profile::insert($params);

    }

}
