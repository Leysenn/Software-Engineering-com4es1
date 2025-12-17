<?php

namespace Database\Factories; // <--- THIS LINE IS CRUCIAL AND LIKELY MISSING

use App\Models\Teacher; // Ensure the correct Model is imported
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class; // Or \App\Models\Teacher::class

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // ... (Your definitions here)
            'full_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'degree' => $this->faker->randomElement(['Bachelor', 'Master', 'PhD']),
            'tel' => $this->faker->phoneNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}