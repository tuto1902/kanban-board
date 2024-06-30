<?php

use App\Livewire\Board;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Livewire\Livewire;
use App\Models\Task;

use function Pest\Laravel\assertDatabaseHas;

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

