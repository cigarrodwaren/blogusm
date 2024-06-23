<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(45),
            'slug' => $this->faker->text(45),

            'extract' => $this->faker->text(45),
            'body' => $this->faker->text(200),

            'status' => $this->faker->randomElement([1,2]),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
