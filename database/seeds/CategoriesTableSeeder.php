<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $params = [
           [ 'name' => 'Informática' ],
           [ 'name' => 'Telefonia' ],
           [ 'name' => 'Móveis' ],
           [ 'name' => 'Eletrodomésticos' ]
        ];

        Category::insert($params);

    }
}
