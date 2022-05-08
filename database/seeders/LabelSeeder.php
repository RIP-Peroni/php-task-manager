<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Label::factory(1)->create(['name' => 'ошибка', 'description' => 'Какая-то ошибка в коде или проблема с функциональностью']);
        \App\Models\Label::factory(1)->create(['name' => 'документация', 'description' => 'Задача которая касается документации']);
        \App\Models\Label::factory(1)->create(['name' => 'дубликат', 'description' => 'Повтор другой задачи']);
        \App\Models\Label::factory(1)->create(['name' => 'доработка', 'description' => 'Новая фича, которую нужно запилить']);
    }
}
