<div x-sort:item="{{ $task->getKey() }}">
    <x-dialog wire:model="showDialog">
        <x-dialog.open>
            <x-kanban.card>
                {{ $task->description }}
            </x-kanban.card>
        </x-dialog.open> 
        <x-dialog.panel>
            <livewire:edit-task wire:key="edit-task-{{ $task->getKey() }}" :task="$task" @task-updated="closeModal" />
        </x-dialog.panel>
    </x-dialog>
</div>
