<?php

use App\Models\Project;
use Livewire\Livewire;
use App\Livewire\Sidebar;
use App\Models\User;

it('shows all projects in the sidebar', function () {
    $user = User::factory()->create();
    Project::factory()->state(['name' => 'Test Project'])->for($user)->create();

    Livewire::actingAs($user)->test(Sidebar::class)
        ->assertSeeText('Test Project');
});

it('shows only projects for the logged in user', function () {
    $user = User::factory()->create();
    $stranger = User::factory()->create();
    Project::factory()->state(['name' => 'Test Project'])->for($user)->create();
    Project::factory()->state(['name' => 'Other Project'])->for($stranger)->create();

    Livewire::actingAs($user)->test(Sidebar::class)
        ->assertSeeText('Test Project')
        ->assertDontSeeText('Other Project');
});
