<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ['Html', 'Css', 'Bootstrap', 'JavaScript', 'Vue', 'Php', 'Laravel'];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->title = $technology;
            $new_technology->slug = $technology;
            $new_technology->color = $faker->rgbColor();
            $new_technology->save();
        }
    }
}


