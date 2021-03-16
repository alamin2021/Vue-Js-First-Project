<?php

use Illuminate\Database\Seeder;
use App\post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,10) as $index ){
            $title = $faker->sentence;
            Post::create([
                "user_id" => rand(1,20),
                "category_id" => rand(1,5),
                "title" => $title ,

                "slug" => slugify($title),
                "content" => $faker->paragraph,
                "thumbnail" => $faker->imageUrl(),
                "status" => $this->getRandomStatus(),
            ]);
        }
    }
    public function getRandomStatus(){
        $statuses = array('draft','published');
        return $statuses[array_rand($statuses)];
    }
}
