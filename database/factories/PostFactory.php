<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realTextBetween(5,  10, 2);
            return [
                'title' => $title,
                'category_id' => random_int(1, 10),
                'description' => $this->faker->realText(),
                'slug' => Str::slug($title)
        ];
    }
}
