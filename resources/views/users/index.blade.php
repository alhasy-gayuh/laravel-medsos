<x-app-layout>
    <x-container>
        <div class="grid grid-cols-4 gap-4">
            <x-following :users="$users" />
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </x-container>
</x-app-layout>
