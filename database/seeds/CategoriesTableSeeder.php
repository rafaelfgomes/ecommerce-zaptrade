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
           [ 'name' => 'Informática', 'slug_name' => 'computing' ],
           [ 'name' => 'Telefonia', 'slug_name' => 'mobile' ],
           [ 'name' => 'Móveis', 'slug_name' => 'furniture' ],
           [ 'name' => 'Eletrodomésticos', 'slug_name' => 'appliances' ]
        ];

        Category::insert($params);

    }
}
