<?php

use App\Models\Group;
use Livewire\Livewire;
use App\Livewire\EditGroup;

use function Pest\Laravel\assertDatabaseHas;

it('can update the group name', function () {
    $group = Group::factory()->create();
    $newGroup = Group::factory()->make();
    
    Livewire::test(EditGroup::class, ['group' => $group])
        ->set('name', $newGroup->name)
        ->call('update');

    assertDatabaseHas('groups', [
        'name' => $newGroup->name
    ]);
});
