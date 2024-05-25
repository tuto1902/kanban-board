<?php

use App\Livewire\Board;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Livewire\Livewire;
use App\Models\Task;

it('shows all groups', function () {
    Group::factory(3)
        ->state(new Sequence(
            ['name' => 'To-Do'],
            ['name' => 'Doing'],
            ['name' => 'Done']
        ))
        ->create();
        
    Livewire::test(Board::class)
        ->assertSeeText([
            'To-Do',
            'Doing',
            'Done',
        ]);
});

it('it shows all tasks from a group', function () {
    $group = Group::factory()->create();
    Task::factory(3)
        ->state(new Sequence(
            ['description' => 'Task 1'],
            ['description' => 'Task 2'],
            ['description' => 'Task 3']
        ))
        ->for($group)
        ->create();

    Livewire::test(Board::class)
        ->assertSeeText([
            'Task 1',
            'Task 2',
            'Task 3',
        ]);
});

it('shows tasks in order', function () {
    $group = Group::factory()->create();
    Task::factory(3)
        ->state(new Sequence(
            ['sort' => 1, 'description' => 'Task 2'],
            ['sort' => 0, 'description' => 'Task 1'],
            ['sort' => 2, 'description' => 'Task 3']
        ))
        ->for($group)
        ->create();

    Livewire::test(Board::class)
        ->assertSeeTextInOrder([
            'Task 1',
            'Task 2',
            'Task 3',
        ]);
});
