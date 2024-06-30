<x-slot:sidebar>
    <x-sidebar>
        <x-sidebar.brand />
        <x-sidebar.group label="Tags">
            <x-sidebar.item href="#" badge="10" active="true">All Tags</x-sidebar.item>
            <x-sidebar.item href="#" :active="false">Bug</x-sidebar.item>
            <x-sidebar.item href="#" :active="false">Enhancement</x-sidebar.item>
        </x-sidebar.group>
    </x-sidebar>
</x-slot:sidebar>

<x-kanban>
    <x-kanban.header />
    <x-kanban.board>
        @foreach($groups as $group)
        <livewire:kanban.group wire:key="group-{{ $group->getKey() }}" :group="$group" />
        @endforeach
        <livewire:add-group @group-created="refreshGroups" />
    </x-kanban.board>
</x-kanban>