<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\{Category, User};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $allStatuses = ["Not Started", "In Progress", "Completed"];

        $statusKey = array_rand($allStatuses);

        return [
            'title' => fake()->realText(100), // then connect to our database when done (env)
            'description' => fake()->paragraph(),
            'due_date' => fake()->dateTimeBetween("now", "+ 5 days"), // validation: above today
            'status' => $allStatuses[$statusKey],
            'category_id' => function () {
                
                return Category::factory()->create()->id;
            },
            "creator_id" => function () {
                
                return User::factory()->create()->id;
            }
        ];
    }
}