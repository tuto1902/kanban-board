<?php

use App\Models\Group;
use App\Models\Task;
use App\Models\Project;
use App\Livewire\Kanban\Group as GroupComponent;
use App\Livewire\Sidebar;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;

it('it shows all tasks from a group', function () {
    $user = User::factory()
        ->create();
    $group = Group::factory()->for($user)->create();
    Task::factory(3)
        ->state(new Sequence(
            ['description' => 'Task 1'],
            ['description' => 'Task 2'],
            ['description' => 'Task 3']
        ))
        ->for($group)
        ->create();

    Livewire::actingAs($user)->test(GroupComponent::class, ['group' => $group])
        ->assertSeeText([
            'Task 1',
            'Task 2',
            'Task 3',
        ]);
});

it('only shows tasks from the logged in user', function (){
    $user = User::factory()
        ->create();

    $stranger = User::factory()
        ->create();

    $group = Group::factory()->for($user)->create();
    Task::factory(3)
        ->state(new Sequence(
            ['description' => 'Task 1'],
            ['description' => 'Task 2'],
            ['description' => 'Task 3']
        ))
        ->for($group)
        ->create();
    Livewire::actingAs($stranger)->test(GroupComponent::class, ['group' => $group])
        ->assertDontSeeText([
            'Task 1',
            'Task 2',
            'Task 3',
        ]);
});

it('shows tasks in order', function () {
    $user = User::factory()
        ->create();
    $group = Group::factory()->for($user)->create();
    Task::factory(3)
        ->state(new Sequence(
            ['sort' => 1, 'description' => 'Task 2'],
            ['sort' => 0, 'description' => 'Task 1'],
            ['sort' => 2, 'description' => 'Task 3']
        ))
        ->for($group)
        ->create();

    Livewire::actingAs($user)->test(GroupComponent::class, ['group' => $group])
        ->assertSeeTextInOrder([
            'Task 1',
            'Task 2',
            'Task 3',
        ]);
});

it('can move task to target position', function () {
    $user = User::factory()
        ->create();
    $group = Group::factory()->for($user)->create();
    Task::factory(3)
        ->state(new Sequence(
            ['sort' => 0],
            ['sort' => 1],
            ['sort' => 2]
        ))
        ->for($group)
        ->create();

    Livewire::actingAs($user)->test(GroupComponent::class, ['group' => $group])
        ->call('sort', 1, 2, $group->getKey());

    expect($group->tasks)
       ->find(1)->sort->toBe(2);
});

it('sort tasks after dragging down', function () {
    $user = User::factory()->create();
    $group = Group::factory()->for($user)->create();
    Task::factory(3)
        ->state(new Sequence(
            ['sort' => 0],
            ['sort' => 1],
            ['sort' => 2]
        ))
        ->for($group)
        ->create();

    Livewire::actingAs($user)->test(GroupComponent::class, ['group' => $group])
        ->call('sort', 1, 2, $group->getKey());

    $group->refresh();

    expect($group->tasks)
       ->find(2)->sort->toBe(0)
       ->find(3)->sort->toBe(1);
});

it('sort tasks after dragging up', function () {
    $user = User::factory()->create();
    $group = Group::factory()->for($user)->create();
    Task::factory(3)
        ->state(new Sequence(
            ['sort' => 0],
            ['sort' => 1],
            ['sort' => 2]
        ))
        ->for($group)
        ->create();

    Livewire::actingAs($user)->test(GroupComponent::class, ['group' => $group])
        ->call('sort', 3, 0, $group->getKey());

    $group->refresh();

    expect($group->tasks)
       ->find(1)->sort->toBe(1)
       ->find(2)->sort->toBe(2);
});

it('filters tasks by project', function (){
    $user = User::factory()
        ->create();

    $group = Group::factory()->for($user)->create();

    $project = Project::factory()->for($user)->create();

    Task::factory(3)
        ->state(new Sequence(
            ['description' => 'Task 1'],
            ['description' => 'Task 2'],
        ))
        ->for($group)
        ->for($project)
        ->create();

    Task::factory()->state(['description' => 'Task 3'])->for($group)->create();

    Livewire::actingAs($user)->test(GroupComponent::class, ['group' => $group])
        ->dispatch('project-filter', $project->id)
        ->assertSeeText([
            'Task 1',
            'Task 2',
        ])
        ->assertDontSeeText('Task 3');
});
