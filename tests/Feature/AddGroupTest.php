<?php

use App\Models\Group;
use Livewire\Livewire;
use App\Livewire\AddGroup;

use function Pest\Laravel\assertDatabaseHas;

it('can create new groups', function () {
    $newGroup = Group::factory()->make();

    Livewire::test(AddGroup::class)
        ->set('name', $newGroup->name)
        ->call('store');

    assertDatabaseHas('groups', [
        'name' => $newGroup->name
    ]);
});
