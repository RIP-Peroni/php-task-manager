<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::all()->each(function ($task) {
            $task->labels()->attach(
                Label::all()->random(rand(0, 4))->pluck('id')->toArray()
            );
        });
    }
}
