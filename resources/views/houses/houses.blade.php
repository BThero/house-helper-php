<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Houses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>You're looking at your houses!</p>

                    @if (count($houses) > 1)
                        @foreach ($houses as $house)
                            <p>This is house {{ $house->id }}</p>
                        @endforeach
                    @endif

                    <a href="{{ url('houses/create') }}">Create a new house</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
