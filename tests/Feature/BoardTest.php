<?php

use App\Livewire\Kanban\Board;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Livewire\Livewire;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('shows all groups', function () {
    $user = User::factory()
        ->create();
    actingAs($user);
    Group::factory(3)
        ->for($user)
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

it('does not shows groups from a different user', function () {
    $user = User::factory()
        ->create();
    $stranger = User::factory()
        ->create();
    actingAs($stranger);
    Group::factory(3)
        ->for($user)
        ->state(new Sequence(
            ['name' => 'To-Do'],
            ['name' => 'Doing'],
            ['name' => 'Done']
        ))
        ->create();

    Livewire::test(Board::class)
        ->assertDontSeeText([
            'To-Do',
            'Doing',
            'Done',
        ]);
});
