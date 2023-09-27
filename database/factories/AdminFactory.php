<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Laravel\Prompts\password;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'password' => bcrypt('123456'),
        ];
    }
}
