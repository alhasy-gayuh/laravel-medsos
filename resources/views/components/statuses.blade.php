<div class="space-y-5 mt-12">
    @foreach ($statuses as $status)
        <x-card>
            <div class="flex">
                <div class="flex-shrink-0 mr-3 mb-5">
                    <img class="w-10 h-10 rounded-full" src="{{ $status->user->gravatar() }}"
                        alt="{{ $status->user->name }}">
                </div>
                <div>
                    <div class="font-semibold">
                        {{ $status->user->name }}
                    </div>
                    <div class="leading-relaxed">
                        {{ $status->body }}
                    </div>
                    <div class="text-sm text-gray-600">
                        {{ $status->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </x-card>
    @endforeach
</div>
