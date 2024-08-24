<?php

use App\Livewire\EditTask;
use App\Models\Group;
use App\Models\Task;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;

it('can edit tasks', function () {
    $user = User::factory()->create();
    $group = Group::factory()->for($user)->create();
    $task = Task::factory()
        ->for($group)
        ->create();

    $newTask = Task::factory()
        ->for($group)
        ->make();

    Livewire::actingAs($user)->test(EditTask::class, ['task' => $task])
        ->set('form.description', $newTask->description)
        ->set('form.task', $task)
        ->call('update');

    assertDatabaseHas('tasks', [
        'description' => $newTask->description
    ]);
});
