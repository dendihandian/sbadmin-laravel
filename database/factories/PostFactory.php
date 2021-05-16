<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // TODO: add more field faker

        $title = $this->faker->sentence(6, true);
        $body =  $this->faker->paragraphs(3);

        return [
            'title' => Str::title($title),
            'slug' => Str::slug($title),
            'excerpt' => $body[0],
            'body' => implode(" ", $body),
        ];
    }
}

// tinker usage:
// \Database\Factories\PostFactory::new()->create();
// \Database\Factories\PostFactory::times(10)->create();