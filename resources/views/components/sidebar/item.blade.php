@props(['active', 'badge'])
@php

$active = $active ?? false;
$badge = $badge ?? false;

@endphp
<a {{ $attributes }} @class([
    'flex cursor-pointer justify-between items-center px-3 py-2 outline-none transition duration-75 hover:bg-gray-100 focus-visible:bg-gray-100 dark:hover:bg-white/5 dark:focus-visible:bg-white/5 rounded-lg',
    'bg-gray-100 dark:bg-white/5' => $active
])>
    <span @class([
        'flex-1 truncate text-sm font-medium',
        'text-indigo-500 dark:text-indigo-500' => $active
    ])>{{ $slot }}</span>
    @if($badge)
    <span class="flex items-center justify-center gap-x-1 rounded-md text-xs font-bold ring-1 ring-inset px-2 min-w-6 py-1 bg-indigo-50 text-indigo-600 ring-indigo-600/10 dark:bg-indigo-500/25 dark:text-indigo-500 dark:ring-indigo-500">
        {{ $badge }}
    </span>
    @endif
</a>
