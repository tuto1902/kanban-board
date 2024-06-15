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
        <x-kanban.group wire:key="group-{{ $group->id }}" x-sort="$wire.sort($item, $position)" :group="$group">
            @foreach($group->tasks()->inOrder()->get() as $task)
            <livewire:kanban.card :task="$task" wire:key="task-{{ $task->getKey() }}" />
            @endforeach
        </x-kanban.group>
        @endforeach
    </x-kanban.board>
</x-kanban>