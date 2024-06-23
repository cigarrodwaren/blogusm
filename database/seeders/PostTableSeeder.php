<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory()->count(100)->create();

        foreach ($posts as $post) {
            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
