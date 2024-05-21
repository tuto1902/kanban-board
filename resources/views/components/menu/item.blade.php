<button
    type="button"
    x-menu:item
    x-bind:class="{
        'bg-white-100 text-gray-950 dark:bg-gray-900 dark:text-white': $menuItem.isActive,
        'text-gray-600 dark:bg-gray-900 dark:text-white': ! $menuItem.isActive,
        'opacity-50 cursor-not-allowed': $menuItem.isDisabled,
    }"
    class="flex items-center gap-2 w-full px-3 py-2 text-left text-sm hover:bg-gray-100 disabled:text-gray-500 dark:hover:bg-white/10 dark:disabled:text-white/10 transition-colors"
    {{ $attributes }}
>
    {{ $slot }}
</button>