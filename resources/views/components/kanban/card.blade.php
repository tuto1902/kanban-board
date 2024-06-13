<a {{ $attributes->get('href') }} {{ $attributes->whereStartsWith('wire:') }} {{ $attributes->whereStartsWith('x-sort') }} class="block p-2 bg-white dark:bg-white/5 ring-1 ring-gray-950/10 dark:ring-white/20 rounded-md shadow">
    <span class="inline-flex items-center p-1 w-9 rounded-full bg-rose-500 dark:bg-rose-400">
    </span>
    <div class="flex items-start justify-between gap-2">
        <div class="flex-1 text-xs font-medium leading-snug">{{ $slot }}</div>
    </div>
    <div class="flex items-baseline justify-between">
        <!-- card icons -->
    </div>
</a>