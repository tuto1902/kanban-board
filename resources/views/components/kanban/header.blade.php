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
                    <div class="flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 ring-gray-950/10 dark:ring-white/20 focus-within:ring-2 focus-within:ring-amber-600 dark:focus-within:ring-amber-500 overflow-hidden">
                        <input class="bg-white/0 block w-full rounded-md border-none text-base sm:text-sm py-2 pl-10 pr-4 sm:leading-6 text-gray-950 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-0" type="text" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 ml-6 flex items-center">
                <button>
                    <img class="inline-block size-8 object-cover rounded-full" src="/img/profile.png">
                </button>
            </div>
        </div>
        <div class="flex items-center justify-between py-2">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">All Tasks</h2>
            </div>
            <div class="flex">
                <x-dialog wire:model="showCreateTaskDialog">
                    <x-dialog.open>
                        <button class="flex items-center pl-2 pr-4 py-2 ml-5 text-sm shadow-sm font-semibold outline-none transition duration-75 focus-visible:ring-2 focus-visible:ring-amber-500/50 dark:focus-visible:ring-amber-400/50 text-white bg-amber-600 dark:bg-amber-500 hover:bg-amber-500 dark:hover:bg-amber-400 rounded-lg">
                            <x-heroicon-o-plus class="h-5 w-5" />
                            <span class="ml-0 lg:ml-1">New Task</span>
                        </button>
                    </x-dialog.open>
                    <x-dialog.panel>
                        <form class="flex flex-col gap-4 mt-8">
                            <label class="flex flex-col gap-2">
                                Task Description
                                <div class="flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 ring-gray-950/10 dark:ring-white/20 focus-within:ring-2 focus-within:ring-amber-600 dark:focus-within:ring-amber-500 overflow-hidden">
                                    <input class="bg-white/0 block w-full rounded-md border-none text-base sm:text-sm px-3 py-2 sm:leading-6 text-gray-950 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-0" type="text" placeholder="Describe what you need to do...">
                                </div>
                            </label>
                            <x-dialog.footer>
                                <x-dialog.close-button>
                                    <button type="button" class="flex items-center px-4 py-2 text-sm shadow-sm font-semibold outline-none transition duration-75 ring-1 ring-gray-950/10 dark:ring-white-20 focus-visible:ring-2 focus-visible:ring-gray-950/10 dark:focus-visible:ring-white-/20 text-gray-950 dark:text-white bg-white dark:bg-white/5 hover:bg-gray-50 dark:hover:bg-white/10 rounded-lg">
                                        <span class="ml-0 lg:ml-1">Cancel</span>
                                    </button>
                                </x-dialog.close-button>
                                <button class="flex items-center px-4 py-2 text-sm shadow-sm font-semibold outline-none transition duration-75 focus-visible:ring-2 focus-visible:ring-amber-500/50 dark:focus-visible:ring-amber-400/50 text-white bg-amber-600 dark:bg-amber-500 hover:bg-amber-500 dark:hover:bg-amber-400 rounded-lg">
                                    <span class="ml-0 lg:ml-1">Save</span>
                                </button>
                            </x-dialog.footer>
                        </form>
                    </x-dialog.panel>
                </x-dialog>
            </div>
        </div>
    </header>
</div>