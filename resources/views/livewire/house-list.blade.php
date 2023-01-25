<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            @if (count($houses) === 0)
                <div class="border-2 border-red-500 rounded-lg p-2 underline text-red-500">
                    No houses yet
                </div>
            @endif

            @foreach ($houses as $house)
                <div
                    class="border-2 mb-4 border-gray-500 rounded-lg">
                    @livewire('house-header', [
                        'house' => $house,
                        'condition' => $house->city ? $responses[$house->city->id]->current->condition->text : null,
                        'temperature' => $house->city ? $responses[$house->city->id]->current->temp_c : null,
                        'is_preloaded' => true
                    ])
                    <div class="p-1 px-3 flex flex-row justify-between items-center">
                        <div>
                            <h2 class="text-gray-900 font-bold text-lg">{{ $house->name }}</h2>
                            <p>{{ $house->description ?: "No description" }}</p>
                        </div>
                        <a class="border-2 border-pink-500 rounded p-1 pl-2 pr-2 hover:text-pink-500"
                           href="{{ url('houses/'.$house->id) }}">
                            Open
                        </a>
                    </div>
                </div>
            @endforeach

            <a class="underline hover:text-pink-500" href="{{ url('houses/create') }}">Create a new house</a>
        </div>
    </div>
</div>
