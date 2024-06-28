<div
    x-data="{ showAddGroupForm: false }"
    x-on:keydown.escape="showAddGroupForm = false"
    class="flex flex-col flex-shrink-0 self-start max-h-full w-80 ring-1 bg-gray-100 dark:bg-gray-900 ring-gray-950/10 dark:ring-white/10 rounded-md"
>
    <template x-if="showAddGroupForm == true">
        <form wire:submit="store" class="p-2">
            <x-text-input wire:model="name" placeholder="List Name" x-ref="input" @class(['ring-1 ring-rose-500 dark:ring-rose-400 focus-within:ring-rose-500 dark:focus-within:ring-rose-400' => $errors->has('name')]) />
            @error('name')
            <span class="text-rose-500 dark:text-rose-400 text-sm pt-1">
                {{ $message }}
            </span>
            @enderror
            <div class="flex items-center justify-start gap-2 pt-2">
                <x-primary-button>
                    Save
                </x-primary-button>
                <x-secondary-button @click="showAddGroupForm = false" type="button">
                    Cancel
                </x-secondary-button>
            </div>
        </form>
    </template>
    <button x-show="showAddGroupForm == false" @click="showAddGroupForm = true; $nextTick(() => $refs.input.focus())" class="flex items-center justify-start gap-1 w-full p-2" type="button">
        <x-heroicon-o-plus class="size-5" /> 
        <span class="text-sm font-medium">Add List</span>
    </button>
</div>