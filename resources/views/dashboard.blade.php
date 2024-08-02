<x-kanban-layout>
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


    <div class="flex flex-col flex-1 min-w-0 bg-white dark:bg-gray-950">
        <livewire:kanban.header />
        <livewire:kanban.board />
        <livewire:edit-task />
    </div>
</x-kanban-layout>
