<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = \App\Models\Course::class;

    public function definition()
    {
        $levels = ['débutant', 'intermédiaire', 'avancé'];
        $subjects = [
            'Développement Web',
            'Intelligence Artificielle',
            'Marketing Digital',
            // Ajoute d'autres sujets ici
        ];

        return [
            'teacher_id' => User::factory()->state(['role' => 'teacher']),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(3, true),
            'level' => $this->faker->randomElement($levels),
            'duration' => $this->faker->numberBetween(30, 300),
            'is_published' => $this->faker->boolean(80), // 80% de chance d'être publié
        ];
    }
}
