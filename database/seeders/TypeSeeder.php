<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Type;

// Helpers
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $allTypes = [
            'IT Company',
            'E-Commerce',
            'Company Portfolio'
        ];

        foreach ($allTypes as $singleType) {
            $type = Type::create([
                'name' => $singleType,
                'slug' => str()->slug($singleType),
            ]);
        }
    }
}
