<x-kanban-layout>
    <x-slot:sidebar>
        <x-sidebar>
            <x-sidebar.brand />
            <x-sidebar.group label="Tags">
                <x-sidebar.item href="#" badge="10" active="true">All Tags</x-sidebar.item>
                <x-sidebar.item href="#" :active="false">Bug</x-sidebar.item>
                <x-sidebar.item href="#" :active="false">Enhancement</x-sidebar.item>
            </x-sidebar.group>
        </x-sidebar>
    </x-slot:sidebar>

    <div class="flex flex-col flex-1 min-w-0 bg-white dark:bg-gray-950">
        <livewire:kanban.header />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:profile.update-profile-information-form />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:profile.update-password-form />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <livewire:profile.delete-user-form />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-kanban-layout>
