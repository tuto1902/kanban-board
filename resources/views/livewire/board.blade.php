<div class="flex h-screen">
    <x-sidebar>
        <x-sidebar.brand />
        <x-sidebar.group label="Tags">
            <x-sidebar.item href="#" badge="10" active="true">All Tags</x-sidebar.item>
            <x-sidebar.item href="#" :active="false">Bug</x-sidebar.item>
            <x-sidebar.item href="#" :active="false">Enhancement</x-sidebar.item>
        </x-sidebar.group>
    </x-sidebar>
    <x-kanban>
        <x-kanban.header />
        <x-kanban.board>
            @foreach($groups as $group)
            <x-kanban.group :label="$group->name">
                @foreach($group->tasks()->inOrder()->get() as $task)
                <x-kanban.card>
                    {{ $task->description }}
                </x-kanban.card>
                @endforeach
            </x-kanban.group>
            @endforeach
        </x-kanban.board>
    </x-kanban>
</div>
