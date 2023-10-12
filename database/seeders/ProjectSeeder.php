<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project;

            $project->title = $faker->word();
            $project->slug = Str::slug($project->title);
            $project->description = $faker->sentence();
            $project->type_id = $faker->numberBetween(1, 5);
            $project->thumb = $faker->imageUrl(640, 480, 'animals', true);
            $project->release_date = $faker->date();
            $project->link = $faker->url();

            $project->save();
        }
    }
}
