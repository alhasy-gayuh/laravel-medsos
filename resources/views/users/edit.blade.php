<x-app-layout>
    <x-slot name="header">
        <h1>Edit Your Profile</h1>
    </x-slot>
    <x-container>
        @if (session()->has('message'))
            <div class="bg-green-500 text-white font-semibold rounded-lg py-4 px-2 my-2">{{ session('message') }}</div>
        @endif
        <div class="w-full lg:w-1/2">
            <x-card>
                <form action="{{ route('profile.update') }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', Auth::user()->name)" />

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>

                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', Auth::user()->email)" />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>

                    <div class="mb-4">
                        <x-input-label for="username" :value="__('Username')" />

                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username', Auth::user()->username)" />

                        <x-input-error :messages="$errors->get('username')" class="mt-2" />

                    </div>

                    <x-primary-button>Submit</x-primary-button>
                </form>
            </x-card>
        </div>
    </x-container>
</x-app-layout>
