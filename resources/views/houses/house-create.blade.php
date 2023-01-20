<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new house') }}
        </h2>
    </x-slot>

    <div class="p-3">
        <form method="POST" action="{{ route('houses.store') }}" class="flex flex-col m-auto w-[50%] gap-2">
            @csrf
            <div class="flex flex-col gap-1">
                <label for="name">Name<span class="text-red-500">*</span></label>
                <input class="rounded-lg" type="text" name="name" id="name" required placeholder="name" />
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="city">City<span class="text-red-500">*</span></label>
                <input class="rounded-lg" type="text" name="city" id="city" required placeholder="city" />
                @error('city')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="address">Address</label>
                <input class="rounded-lg" type="text" name="address" id="address" placeholder="address" />
                @error('address')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="description">Description</label>
                <textarea class="rounded-lg" name="description" id="description" cols="10" rows="2" placeholder="description"></textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-primary-button>Create</x-primary-button>
        </form>
    </div>
</x-app-layout>
