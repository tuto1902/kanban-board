@props([ 'label' ])
<nav class="mt-8">
    <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ $label }}</h3>
    <div class="flex flex-col gap-1 mt-2 -mx-3">
        {{ $slot }}
    </div>
</nav>