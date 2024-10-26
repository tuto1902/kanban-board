<x-kanban-layout>
    <x-slot:sidebar>
        <livewire:sidebar />
    </x-slot:sidebar>


    <div class="flex flex-col flex-1 min-w-0 bg-white dark:bg-gray-950">
        <livewire:kanban.header />
        <livewire:kanban.board />
        <livewire:edit-task />
        <livewire:add-project />
        <livewire:edit-project />
        <livewire:add-label />
        <livewire:edit-label />
    </div>
</x-kanban-layout>
