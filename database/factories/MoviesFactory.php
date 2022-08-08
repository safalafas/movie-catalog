<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movies>
 */
class MoviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'release_date'=>$this->faker->date($format = 'Y-m-d', $max='now'),
            'is_published'=>$this->faker->boolean()
        ];
    }
}
