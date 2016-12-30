<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	(new Category([
    		'name' => 'Nha Container'
    	]))->save();
        (new Category([
            'name' => 'Nha Biet Thu'
        ]))->save();
    }
}
