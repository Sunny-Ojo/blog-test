<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
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
            'name' => $title,
            'slug' => Str::slug($title)
        ];
    }
}
