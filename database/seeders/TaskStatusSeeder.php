<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TaskStatus::factory(1)->create(['name' => 'новый']);
        \App\Models\TaskStatus::factory(1)->create(['name' => 'в работе']);
        \App\Models\TaskStatus::factory(1)->create(['name' => 'на тестировании']);
        \App\Models\TaskStatus::factory(1)->create(['name' => 'завершен']);
    }
}
