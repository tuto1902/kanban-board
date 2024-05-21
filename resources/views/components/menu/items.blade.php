<div
    x-menu:items
    x-transition:enter.origin.top.right
    x-anchor.bottom-end="document.getElementById($id('alpine-menu-button'))"
    class="w-48 z-10 bg-white dark:bg-gray-900 border border-gray-950/10 dark:border-white/10 divide-y divide-gray-950/10 dark:divide-white/10 rounded-md shadow-md py-1 outline-none"
    x-cloak
>
    {{ $slot }}
</div>