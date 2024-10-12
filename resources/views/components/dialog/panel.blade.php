<div
    x-dialog
    x-model="open"
    style="display: none"
    class="fixed inset-0 overflow-y-auto z-10 text-left"
>
    <!-- Overlay -->
    <div x-dialog:overlay x-transition.opacity class="fixed inset-0 bg-gray-950/50 dark:bg-gray-950/75"></div>

    <!-- Panel -->
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div
            x-dialog:panel
            x-transition.in x-transition.out.opacity
            class="relative max-w-sm w-full ring-1 ring-gray-950/5 dark:ring-white/10 bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-y-auto"
        >
            <!-- Close Button -->
            <div class="absolute top-0 right-0">
                <button type="button" x-on:click="$dialog.close()" class="rounded-lg p-2 text-gray-600 focus:outline-none focus-visible:ring-none">
                    <span class="sr-only">Close modal</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <!-- Panel -->
            <div class="p-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
