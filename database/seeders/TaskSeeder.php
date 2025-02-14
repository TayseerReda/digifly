<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks=[
            [
                'name' => 'digifly task',
                'description' => 'This is completed.',
                'status' => 'done',
            ],
            [
                'name' => 'digifly task',
                'description' => 'This is in progress.',
                'status' => 'in_progress',
            ],
        ];

        foreach($tasks as $task){
            Task::create($task);
        }
    }
}
