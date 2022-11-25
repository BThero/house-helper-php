<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('House #'.$house->id.'. '.$house->name) }}
        </h2>
        <p>
            {{$house->description}}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <p class="text-lg">Members:</p>
                        @foreach ($house->users as $user)
                            <div class="flex flex-row justify-between items-center border-2 border-black p-2 rounded-lg">
                                <div class="flex flex-row items-center justify-start gap-2">
                                    <p class="text-lg font-bold">{{$user->username}}</p>
                                    <p class="text-gray-700">{{$user->pivot->user_role}}</p>
                                </div>
                                @if ($user->id != $me->id)
                                <div>
                                    <button class="border-2 border-red-500 rounded-lg hover:text-red-500 p-1 pl-2 pr-2">Kick out</button>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
