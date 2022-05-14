<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TaskStatusSeeder::class,
            UserSeeder::class,
            TaskSeeder::class,
            LabelSeeder::class,
            LabelTaskSeeder::class
        ]);
    }
}
