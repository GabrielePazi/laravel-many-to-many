<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $train = new Project;

            $train->title = $faker->word();
            $train->description = $faker->sentence();
            $train->thumb = $faker->imageUrl(640, 480, 'animals', true);
            $train->release_date = $faker->date();
            $train->link = $faker->url();

            $train->save();
        }
    }
}
