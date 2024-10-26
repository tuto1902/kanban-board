<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Label;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        $project = Project::factory()->for($user)->state(['name' => 'Project A'])->create();

        $group1 = Group::factory()->state(['name' => 'To-Do'])->for($user)->create();
        $group2 = Group::factory()->state(['name' => 'In Progress'])->for($user)->create();

        Label::factory(3)
            ->state(new Sequence(
                ['name' => 'Bug', 'color' => 'bg-red-600 text-white'],
                ['name' => 'Feature', 'color' => 'bg-green-600 text-white'],
                ['name' => 'Priority', 'color' => 'bg-indigo-600 text-white']
            ))->create();
        Task::factory(4)
            ->state(new Sequence(
                ['sort' => 0, 'description' => 'Task 1'],
                ['sort' => 1, 'description' => 'Task 2'],
                ['sort' => 2, 'description' => 'Task 3'],
                ['sort' => 3, 'description' => 'Task 4'],
            ))
            ->for($group1)
            ->for($project)
            ->create();
        Task::factory(3)
            ->state(new Sequence(
                ['sort' => 0, 'description' => 'One'],
                ['sort' => 1, 'description' => 'Two'],
                ['sort' => 2, 'description' => 'Three'],
            ))
            ->for($group2)
            ->for($project)
            ->create();
    }
}
