<?php

namespace Database\Factories;

use App\Models\Label;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $creator = User::query()->inRandomOrder()->first();
        $executor = User::query()->inRandomOrder()->first();
        $status = TaskStatus::query()->inRandomOrder()->first();
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->words(30, true),
            'status_id' => $status->id,
            'created_by_id' => $creator->id,
            'assigned_to_id' => $executor->id,
        ];
    }
}
