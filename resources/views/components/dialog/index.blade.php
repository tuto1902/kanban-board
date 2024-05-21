<div
    x-data="{ open: false }"
    x-modelable="open"
    {{ $attributes }}
    tabindex="-1"
>
    {{ $slot }}
</div>