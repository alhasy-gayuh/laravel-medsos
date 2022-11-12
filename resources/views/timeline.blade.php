<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7">
                <x-card>
                    <form action="{{ route('status.store') }}" method="post">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3 mb-5">
                                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}"
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-3">
                                    <textarea name="body" id="body" placeholder="What is your mind"
                                        class="form-textarea rounded-xl w-full border-gray-300 resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"></textarea>
                                </div>
                                <div class="text-right">
                                    <x-primary-button>Post</x-primary-button>
                                </div>
                            </div>
                    </form>
                </x-card>
            </div>

            {{-- Untuk menampilkan status --}}
            <x-statuses :statuses="$statuses"></x-statuses>

        </div>

        @if (Auth::user()->follows()->count())
            <div class="col-span-5">
                <x-card>
                    <p class="font-semibold mb-5 text-lg">Recently Following</p>
                    <div class="space-y-5">
                        <x-following :users="Auth::User()
                            ->follows()
                            ->limit(5)
                            ->get()" />
                    </div>
                </x-card>
            </div>
        @endif

        </div>
    </x-container>
</x-app-layout>
