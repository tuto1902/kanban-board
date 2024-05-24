@props(['label'])

<div class="flex flex-col flex-shrink-0 w-80 ring-1 bg-gray-100 dark:bg-gray-900 ring-gray-950/10 dark:ring-white/10 rounded-md">
    <h3 class="flex-shrink-0 px-3 pt-3 pb-1 text-sm font-medium">{{ $label }}</h3>
    <div class="flex-1 min-h-0 overflow-y-auto" style="scrollbar-width: thin;">
        <div class="pt-1 pb-3 flex flex-col gap-3 px-3">
            {{ $slot }}
        </div>
    </div>
</div>