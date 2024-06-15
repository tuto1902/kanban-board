<?php

use App\Livewire\EditTask;
use App\Models\Group;
use App\Models\Task;

use function Pest\Laravel\assertDatabaseHas;

it('can edit tasks', function () {
    $group = Group::factory()->create();
    $task = Task::factory()
        ->for($group)
        ->create();

    $newTask = Task::factory()
        ->for($group)
        ->make();

    Livewire::test(EditTask::class, ['task' => $task])
        ->set('description', $newTask->description)
        ->call('update');

    assertDatabaseHas('tasks', [
        'description' => $newTask->description
    ]);
});
