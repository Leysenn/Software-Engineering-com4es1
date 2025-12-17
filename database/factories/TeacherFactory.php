<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['M', 'F']);

        return [
            'full_name' => $this->faker->name($gender == 'M' ? 'male' : 'female'),
            'gender' => $gender,
            'degree' => $this->faker->randomElement(['B.S.', 'M.S.', 'Ph.D.']),
            
            // 💡 FIX: Use numerify to ensure a 10-digit number (max length 10)
            'tel' => $this->faker->unique()->numerify('##########'), 
        ];
    }
}