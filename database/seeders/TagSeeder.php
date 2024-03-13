<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Tag;

// Helpers
use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Tag::truncate();
        });

        $allTags = [
            'HTML',
            'CSS',
            'JavaScript',
            'Vue',
            'React',
            'Angular',
            'Php',
            
        ];

        foreach ($allTags as $singleTag) {
            $tag = Tag::create([
                'name' => $singleTag,
                'slug' => str()->slug($singleTag),
            ]);
        }
    }
}
