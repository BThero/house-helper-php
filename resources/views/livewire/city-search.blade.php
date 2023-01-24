<div class="relative flex flex-col gap-1">
    <label for="city">City</label>
    <input value="{{$query}}" class="rounded-lg" type="text" name="city" id="city" placeholder="New York"
           wire:change="setQueryValueAndEnable($event.target.value)"/>

    @if(count($cities) > 0)
        <div
            class="flex flex-col gap-1 absolute top-[80px] max-h-60 overflow-y-auto z-10 w-full bg-white rounded p-2 shadow-lg">

            <button wire:click.prevent="disableSearch"
                    class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-gray-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Close
            </button>

            @foreach($cities as $city)
                <button class="rounded p-1 bg-gray-100 block"
                        wire:click.prevent="setQueryValueAndDisable('{{$city->full_name}}')">
                    {{$city->full_name}}
                </button>
            @endforeach
        </div>
    @endif

    @error('city')
    <p class="text-red-500">{{ $message }}</p>
    @enderror
</div>
