<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {

            $project = new Project();

            $project->title = $faker->realText(20);
            $project->description = $faker->realText();
            $project->git_link = $faker->url();
            $project->project_link = $faker->url();
            $project->slug = Str::slug($project->title, '-');
            $project->cover_image = $faker->image('public/storage/cover_images', fullPath: false);

            $project->save();
        }
    }
}
