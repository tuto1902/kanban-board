@props(['active', 'badge'])
@php

$active = $active ?? false;
$badge = $badge ?? false;

@endphp
<a {{ $attributes->get('href') }} @class([
    'flex justify-between items-center px-3 py-2 outline-none transition duration-75 hover:bg-gray-100 focus-visible:bg-gray-100 dark:hover:bg-white/5 dark:focus-visible:bg-white/5 rounded-lg',
    'bg-gray-100 dark:bg-white/5' => $active
])>
    <span @class([
        'flex-1 truncate text-sm font-medium',    
        'text-amber-600 dark:text-amber-400' => $active
    ])>{{ $slot }}</span>
    @if($badge)
    <span class="flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-6 py-1 bg-amber-50 text-amber-600 ring-amber-600/10 dark:bg-amber-400/10 dark:text-amber-400 dark:ring-amber-400/30">
        {{ $badge }}        
    </span>
    @endif
</a>