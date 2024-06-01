<a {{ $attributes->get('href') }} {{ $attributes->whereStartsWith('wire:') }} {{ $attributes->whereStartsWith('x-sort') }} class="block p-5 bg-white dark:bg-white/5 ring-1 ring-gray-950/10 dark:ring-white/20 rounded-md shadow">
    <div class="flex items-start justify-between gap-2">
        <div class="flex-1 text-sm font-medium leading-snug">{{ $slot }}</div>
    </div>
    <div class="flex items-baseline justify-between">
        <div class="text-sm font-medium text-gray-400">
            <time datetime="2024-05-02">May 2</time>
        </div>
        <div class="mt-2">
            <span class="inline-flex items-center px-2 py-1 leading-tight rounded bg-rose-100 dark:bg-rose-200">
                <svg class="h-2 w-2 text-rose-500" vieyBox="0 0 8 8" fill="currentColor">
                    <circle cx="4" cy="4" r="3" />
                </svg>
                <span class="ml-2 text-sm font-medium text-rose-900">Bug</span>
            </span>
        </div>
    </div>
</a>