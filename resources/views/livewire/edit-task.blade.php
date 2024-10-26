<x-dialog wire:model="showDialog" @keyup.escape="open = false">
    <x-dialog.panel>
        <div class="mt-4" x-effect="$wire.resetDialogForm(open)">
            <form wire:submit="update" class="space-y-6">
                <div class="flex flex-col gap-2 mb-2">
                    <x-text-input wire:model="form.description" placeholder="Task description" autofocus />
                    @error('form.description')
                    <span class="text-rose-500 dark:text-rose-400 text-sm pt-1">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <x-select wire:model="form.projectId">
                        <option value="">Project...</option>
                        @foreach($projects as $project)
                        <option value="{{ $project->getKey() }}">{{ $project->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="space-y-1">
                    @foreach($this->labels as $label)
                    <label class="font-medium flex items-center group">
                        <input x-ref="checkbox" wire:model="form.taskLabels" value="{{ $label->id }}" type="checkbox" class="h-4 w-4 mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <div class="flex-1 max-w-32 py-1 px-2 rounded-md mr-1 text-sm {{ $label->color }}">
                            {{ $label->name }}
                        </div>
                        <a href="#" @click="$dispatch('edit-label', { label: {{ $label->id }} })" class="hidden group-hover:inline-block group-hover:cursor-pointer">
                            <x-heroicon-o-pencil-square class="size-5" />
                        </a>
                    </label>
                    @endforeach
                    <button @click="$dispatch('add-label')" class="flex items-center justify-start gap-1 py-1 px-2 ml-6 w-32 text-sm rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <x-heroicon-o-plus class="size-5" />
                        Add Label
                    </button>
                </div>
                <div class="flex items-center justify-between">
                    <div class="pt-2">
                        <x-danger-button type="button" wire:click.prevent="destroy" wire:confirm="Are you sure you want to delete this task?">
                            Delete
                        </x-danger-button>
                    </div>
                    <div class="flex items-center justify-start gap-2 pt-2">
                        <x-primary-button>
                            Save
                        </x-primary-button>
                        <x-secondary-button @click="open = false" type="button">
                            Cancel
                        </x-secondary-button>
                    </div>
                </div>
            </form>
        </div>
    </x-dialog.panel>
</x-dialog>
