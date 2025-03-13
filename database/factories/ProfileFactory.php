<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'biography' => fake()->paragraphs(2, true),
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode(fake()->name()) . '&background=random&color=fff',
            'website' => fake()->url(),
        ];
    }
}
