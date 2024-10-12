<div
    x-sort:item="{{ $group->getKey() }}"
    @task-updated.window="$wire.$refresh"
    @task-deleted.window="$wire.$refresh"
    class="flex flex-col flex-shrink-0 self-start max-h-full w-80 ring-1 bg-gray-100 dark:bg-gray-900 ring-gray-950/10 dark:ring-white/10 rounded-md"
>
    <livewire:edit-group wire:key="edit-group-{{ $group->getKey() }}" :group="$group" />
    <div class="flex-1 min-h-0 overflow-y-auto">
        <div x-sort="$wire.sort($item, $position, {{ $group->getKey() }})" x-sort:group="groups" class="pt-1 pb-3 flex flex-col gap-3 px-3">
            @foreach($this->tasks as $task)
            <a
                href="#"
                x-sort:item="{{ $task->getKey() }}"
                class="block p-2 bg-white dark:bg-white/5 ring-1 ring-gray-950/10 dark:ring-white/20 rounded-md shadow"
                @click="$dispatch('edit-task', { task: {{ $task->getKey() }} })"
            >
                @foreach($task->labels as $label)
                <span class="inline-flex items-center p-1 w-9 rounded-full {{ $label->color }}">
                </span>
                @endforeach
                <div class="flex items-start justify-between gap-2">
                    <div class="flex-1 text-xs font-medium leading-snug">{{ $task->description }}</div>
                </div>
                <div class="flex items-baseline justify-between">
                    <!-- card icons -->
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <livewire:add-task wire:key="add-task-{{ $group->getKey() }}" :group="$group" @task-created="$refresh" />
</div>
