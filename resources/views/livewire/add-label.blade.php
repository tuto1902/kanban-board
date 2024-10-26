<x-dialog wire:model="showDialog" @keyup.escape="open = false">
    <x-dialog.panel>
        <div class="mt-4" x-effect="$wire.resetDialogForm(open)">
            <form wire:submit="store">
                <h2 class="text-xl font-semibold mb-4">Create Label</h2>
                <div class="flex flex-col gap-2 mb-2">
                    <x-input-label value="Name" />
                    <x-text-input wire:model="form.name" placeholder="Label name" />
                    @error('form.name')
                    <span class="text-rose-500 dark:text-rose-400 text-sm pt-1">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-4 space-y-2">
                    <x-input-label value="Select Color" />
                    @error('form.color')
                    <span class="text-rose-500 dark:text-rose-400 text-sm pt-1">
                        {{ $message }}
                    </span>
                    @enderror
                    <div x-data class="grid grid-cols-5 gap-2">
                        <!-- Colors will be added here dynamically -->
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-green-400 text-gray-900" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-green-400 text-gray-900'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-green-400 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-yellow-400 text-gray-900" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-yellow-400 text-gray-900'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-yellow-400 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-orange-400 text-gray-900" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-orange-400 text-gray-900'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-orange-400 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-red-400 text-gray-900" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-red-400 text-gray-900'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-red-400 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-indigo-400 text-gray-900" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-indigo-400 text-gray-900'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-indigo-400 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-green-600 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-green-600 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-green-600 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-yellow-600 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-yellow-600 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-yellow-600 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-orange-600 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-orange-600 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-orange-600 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-red-600 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-red-600 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-red-600 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-indigo-600 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-indigo-600 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-indigo-600 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-green-800 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-green-800 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-green-800 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-yellow-800 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-yellow-800 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-yellow-800 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-orange-800 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-orange-800 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-orange-800 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-red-800 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-red-800 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-red-800 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <label>
                            <input type="radio" name="color" wire:model="form.color" value="bg-indigo-800 text-white" class="hidden peer" />
                            <div x-on:click="$wire.form.color = 'bg-indigo-800 text-white'" class="w-12 h-8 rounded-md cursor-pointer border-2 bg-indigo-800 peer-checked:ring-4 peer-checked:ring-indigo-500"></div>
                        </label>
                        <!-- Add more colors as needed -->
                    </div>
                </div>
                <div class="flex items-center justify-end">
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
