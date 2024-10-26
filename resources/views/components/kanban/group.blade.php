@props(['group'])

<div
    {{ $attributes->whereStartsWith('wire:') }}
    class="flex flex-col flex-shrink-0 self-start max-h-full w-80 ring-1 bg-gray-100 dark:bg-gray-900 ring-gray-950/10 dark:ring-white/10 rounded-md"
>
    <livewire:edit-group wire:key="edit-group-{{ $group->getKey() }}" :group="$group" />
    <div class="flex-1 min-h-0 overflow-y-auto" style="scrollbar-width: thin;">
        <div {{ $attributes->whereStartsWith('x-sort') }} class="pt-1 pb-3 flex flex-col gap-3 px-3">
            {{ $slot }}
        </div>
    </div>
    <livewire:add-task wire:key="add-task-{{ $group->getKey() }}" :group="$group" />
</div>