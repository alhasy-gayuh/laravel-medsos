<x-app-layout>
    <x-slot name="header">
        <h1>Edit Your Password</h1>
    </x-slot>
    <x-container>
        @if (session()->has('message'))
            <div class="bg-green-500 text-white font-semibold rounded-lg py-4 px-2 my-2">{{ session('message') }}</div>
        @endif
        <div class="w-full lg:w-1/2">
            <x-card>
                <form action="{{ route('password.edit') }}" method="post">
                    @method('put')
                    @csrf
                    <!-- Current Password -->
                    <div class="mb-4">
                        <x-input-label for="current_password" :value="__('Current Password')" />

                        <x-text-input id="current_password" class="block mt-1 w-full" type="password"
                            name="current_password" required />

                        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                    </div>

                    <!-- New Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('New Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            required />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-primary-button>Update</x-primary-button>
                </form>
            </x-card>
        </div>
    </x-container>
</x-app-layout>
