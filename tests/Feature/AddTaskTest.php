<?php

use App\Models\Group;
use App\Models\Task;
use App\Livewire\AddTask;
use App\Models\Label;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;

it('can create tasks', function () {
    $user = User::factory()->create();
    $group = Group::factory()->for($user)->create();
    $label = Label::factory()->create();
    $newTask = Task::factory()
        ->make();

    Livewire::actingAs($user)->test(AddTask::class, ['group' => $group])
        ->set('form.description', $newTask->description)
        ->set('form.label_id', $label->id)
        ->call('store');

    assertDatabaseHas('tasks', [
        'description' => $newTask->description,
    ]);

    assertDatabaseHas('label_task', [
        'task_id' => 1,
        'label_id' => 1
    ]);
});

it('properly sorts new tasks', function () {
    $user = User::factory()->create();
    $group = Group::factory()->for($user)->create();

    Task::factory()
        ->state(['sort' => 0])
        ->for($group)
        ->create();

    $newTask = Task::factory()
        ->make();

    Livewire::actingAs($user)->test(AddTask::class, ['group' => $group])
        ->set('form.description', $newTask->description)
        ->call('store');

    assertDatabaseHas('tasks', [
        'description' => $newTask->description,
        'sort' => 1
    ]);
});
