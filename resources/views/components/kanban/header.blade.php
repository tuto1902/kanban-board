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
                        <input class="bg-white/0 block w-full rounded-md border-none text-base sm:text-sm py-2 pl-10 pr-4 sm:leading-6 text-gray-950 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus-visible:outline-none focus:ring-0" type="text" placeholder="Search">
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
        </div>
    </header>
</div>
