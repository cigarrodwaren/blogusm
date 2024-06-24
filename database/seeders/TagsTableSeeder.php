<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            "name"=> "Clases Online",
           "slug"=> Str::slug("Clases Online"),
        ]);
        Tag::create([
            "name"=> "Laboratorios",
            "slug"=> Str::slug("Laboratorios"),
        ]);
        Tag::create([
            "name"=> "Catedra",
            "slug"=> Str::slug("Catedra"),
        ]);
        //Tag::factory()->count(10)->create();
    }
}
