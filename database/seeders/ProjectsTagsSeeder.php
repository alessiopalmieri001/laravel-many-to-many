<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;
use App\Models\Tag;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ProjectsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 10; $i++) {
            $randomProject = Project::inRandomOrder()->first();
            $randomTag = Tag::inRandomOrder()->first();

            $existigData = DB::table('project_tag')
                ->where('project_id', $randomProject->id)
                ->where('tag_id', $randomTag->id)
                ->exists();

            if (!$existigData) {
                DB::table('project_tag')->insert([
                    ['project_id' => $randomProject->id, 'tag_id' => $randomTag->id]
                ]);
            }
        }
    }
}
