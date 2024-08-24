<?php

use App\Models\Group;
use Livewire\Livewire;
use App\Livewire\EditGroup;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;

it('can update the group name', function () {
    $user = User::factory()->create();
    $group = Group::factory()->for($user)->create();
    $newGroup = Group::factory()->make();

    Livewire::actingAs($user)->test(EditGroup::class, ['group' => $group])
        ->set('form.name', $newGroup->name)
        ->call('update');

    assertDatabaseHas('groups', [
        'name' => $newGroup->name
    ]);
});
