<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your existing house') }}
        </h2>
    </x-slot>

    <div class="p-3">
        <form method="POST" action="{{ route('houses.update', $house->id) }}" class="flex flex-col m-auto w-[50%] gap-2">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-1">
                <label for="name">Name<span class="text-red-500">*</span></label>
                <input class="rounded-lg" type="text" name="name" id="name" required placeholder="name" value="{{ $house->name }}" />
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="description">Description</label>
                <textarea class="rounded-lg" name="description" id="description" cols="10" rows="2" placeholder="description">{{ $house->description }}</textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-primary-button>Edit</x-primary-button>
        </form>
    </div>
</x-app-layout>
