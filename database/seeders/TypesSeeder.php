<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;


class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['FrontEnd', 'Backend', 'FullStack', 'Design', 'DevOps'];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->title = $type;
            $new_type->slug = Str::slug($new_type->title);
            $new_type->save();
        }
    }
}
