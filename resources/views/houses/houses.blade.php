<x-app-layout :uses_livewire="true">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Houses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:house-list :houses="$houses"/>
    </div>
</x-app-layout>
