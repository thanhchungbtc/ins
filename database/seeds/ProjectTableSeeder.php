<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$category_count = \App\Category::count();

    	$faker = Faker::create();
    	foreach(range(1, 10) as $index) {
	    	$project = new \App\Project([
	    		'name' => $faker->address,
				'description' => $faker->paragraph(3, true),
		        'investor' => $faker->name,
		        'price' => $faker->numberBetween(100000, 500000)
	    	]);


	    	\App\Category::find(rand(1, $category_count))
	    		->first()
	    		->projects()
	    		->save($project);

    	}

    }
}
