<?php

use App\Models\User;
use Livewire\Livewire;
use App\Livewire\AddProject;
use App\Livewire\EditProject;
use App\Models\Project;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

it('can create projects', function () {
    $user = User::factory()->create();
    $project = Project::factory()->make();

    Livewire::actingAs($user)->test(AddProject::class)
        ->set('form.name', $project->name)
        ->call('store');

    assertDatabaseHas('projects', [
        'name' => $project->name
    ]);
});

it('can update projects', function () {
    $user = User::factory()->create();
    $project = Project::factory()->for($user)->create();
    $newProject = Project::factory()->make();

    Livewire::actingAs($user)->test(EditProject::class, ['project' => $project])
        ->set('form.name', $newProject->name)
        ->set('form.project', $project)
        ->call('update');

    assertDatabaseHas('projects', [
        'name' => $newProject->name
    ]);
});

it('can delete projects', function () {
    $user = User::factory()->create();
    $project = Project::factory()->for($user)->create();

    Livewire::actingAs($user)->test(EditProject::class, ['project' => $project])
        ->call('setProject', $project)
        ->call('destroy');

    assertDatabaseMissing('projects', [
        'name' => $project->name
    ]);
});
