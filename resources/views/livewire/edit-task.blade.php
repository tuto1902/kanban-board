<div class="mt-4" x-effect="$wire.resetDialogForm(open)">
    <form wire:submit="update">
        <x-text-input wire:model="form.description" placeholder="Task description" autofocus />
        @error('form.description')
        <span class="text-rose-500 dark:text-rose-400 text-sm pt-1">
            {{ $message }}
        </span>
        @enderror
        <div class="flex items-center justify-start gap-2 pt-2">
            <x-primary-button>
                Save
            </x-primary-button>
            <x-secondary-button wire:click="$parent.closeModal()" type="button">
                Cancel
            </x-secondary-button>
        </div>
    </form>
</div>
