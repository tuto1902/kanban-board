<div
    x-data="{ sidebarOpen: false }"
    @toggle-sidebar.window="sidebarOpen = ! sidebarOpen"
>
    <!-- Overlay -->
    <div
        x-show="sidebarOpen" x-cloak x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-gray-950/50 dark:bg-gray-950/75"
    ></div>
    <div
        :class="{'translate-x-0': sidebarOpen}"
        class="fixed lg:static top-0 start-0 bottom-0 z-50 h-full w-64 px-8 py-4 bg-white dark:bg-gray-900 lg:bg-transparent lg:shadow-none lg:ring-0 dark:lg:bg-transparent shadow-xl border-r border-gray-950/5 dark:border-white/10 overflow-auto transform -translate-x-full lg:translate-x-0 transition-all ease-in-out duration-300"
    >
        {{ $slot }}
    </div>
</div>