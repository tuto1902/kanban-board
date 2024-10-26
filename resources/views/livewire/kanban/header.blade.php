<div class="flex-shrink-0 border-b-2 border-gray-950/5 dark:border-white/10">
    <header class="px-6">
        <div class="flex items-center justify-between py-3 border-b border-gray-950/10 dark:border-white/10">
            <div class="flex flex-1 min-w-0">
                <button @click="$dispatch('toggle-sidebar')" class="lg:hidden">
                    <x-heroicon-o-bars-3-bottom-left class="w-6 h-6" />
                </button>
                <div class="flex-shrink-1 relative w-64 ml-3 lg:ml-0">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400" />
                    </span>
                    <div class="flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 ring-gray-950/10 dark:ring-white/20 focus-within:ring-2 focus-within:ring-indigo-500 dark:focus-within:ring-indigo-500 overflow-hidden">
                        <input wire:model.live="search" class="bg-white/0 block w-full rounded-md border-none text-base sm:text-sm py-2 pl-10 pr-4 sm:leading-6 text-gray-950 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus-visible:outline-none focus:ring-0" type="text" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 ml-6 flex items-center">
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between py-2">
            <div class="flex-1 group">
                @if($projectId)
                <a href="#" @click="$dispatch('edit-project', { project: {{ $projectId }} })" class="text-2xl font-semibold leading-tight">
                    {{ $title }}
                    <span class="hidden group-hover:inline-block group-hover:cursor-pointer">
                        <x-heroicon-o-pencil-square class="size-5" />
                    </span>
                </a>
                @else
                <h2 class="text-2xl font-semibold leading-tight">{{ $title }}</h2>
                @endif
            </div>
            <div>
                <x-primary-button @click="$dispatch('add-project')">
                    <span class="font-bold leading-tight text-sm">New Project</span>
                </x-primary-button>
            </div>
        </div>
    </header>
</div>
