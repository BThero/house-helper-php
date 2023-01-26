<x-app-layout :uses-livewire="true">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your existing house') }}
        </h2>
    </x-slot>

    <div class="p-3">
        <form method="POST" action="{{ route('houses.update', $house->id) }}"
              class="flex flex-col m-auto w-[50%] gap-2">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-1">
                <label for="name">Name<span class="text-red-500">*</span></label>
                <input class="rounded-lg" type="text" name="name" id="name" required placeholder="My awesome house"/>
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <livewire:city-search/>

            <div class="flex flex-col gap-1">
                <label for="address">Address</label>
                <input class="rounded-lg" type="text" name="address" id="address"
                       placeholder="313 Campfire St. Bay Shore"/>
                @error('address')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="description">Description</label>
                <textarea class="rounded-lg" name="description" id="description" cols="10" rows="2"
                          placeholder="My brand new cool house"></textarea>
                @error('description')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-primary-button>Edit</x-primary-button>
        </form>
    </div>
</x-app-layout>
