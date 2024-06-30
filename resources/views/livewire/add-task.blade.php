<div
    x-data="{ showAddTaskForm: false }"
    x-on:keyup.escape="showAddTaskForm = false"
    class="p-3">
    <template x-if="showAddTaskForm == true">
        <form wire:submit="store">
            <x-text-input
                wire:model="description"
                placeholder="Task description"
                x-ref="input"
                @class(['ring-1 ring-rose-500 dark:ring-rose-400 focus-within:ring-rose-500 dark:focus-within:ring-rose-400' => $errors->has('description')])
            />
            @error('description')
            <span class="text-rose-500 dark:text-rose-400 text-sm pt-1">
                {{ $message }}
            </span>
            @enderror
            <div class="flex items-center justify-start gap-2 pt-2">
                <x-primary-button>
                    Save
                </x-primary-button>
                <x-secondary-button @click="showAddTaskForm = false" type="button">
                    Cancel
                </x-secondary-button>
            </div>
        </form>
    </template>
    <button x-show="showAddTaskForm == false" @click="showAddTaskForm = true; $nextTick(() => { $refs.input.focus(); });" class="flex items-center justify-start gap-1 w-full" type="button">
        <x-heroicon-o-plus class="size-5" /> 
        <span class="text-sm font-medium">Add Card</span>
    </button>
</div>
