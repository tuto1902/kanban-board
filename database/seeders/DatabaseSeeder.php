<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $group1 = Group::factory()->state(['name' => 'To-Do'])->create();
        $group2 = Group::factory()->state(['name' => 'In Progress'])->create();
        Task::factory(4)
            ->state(new Sequence(
                ['sort' => 0, 'description' => 'Task 1'],
                ['sort' => 1, 'description' => 'Task 2'],
                ['sort' => 2, 'description' => 'Task 3'],
                ['sort' => 3, 'description' => 'Task 4'],
            ))
            ->for($group1)
            ->create();
        Task::factory(3)
            ->state(new Sequence(
                ['sort' => 0, 'description' => 'One'],
                ['sort' => 1, 'description' => 'Two'],
                ['sort' => 2, 'description' => 'Three'],
            ))
            ->for($group2)
            ->create();
    }
}
