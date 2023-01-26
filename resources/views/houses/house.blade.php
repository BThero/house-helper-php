<x-app-layout :uses-livewire="true">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('House #'.$house->id.'. '.$house->name) }}
        </h2>
        <p>
            {{$house->description}}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto rounded-lg bg-white overflow-hidden shadow-sm">
            <livewire:house-header :house="$house"/>
            <nav
                class="flex flex-row items-center justify-between p-1 px-2 h-10 w-full drop-shadow-lg border-b-2 border-gray-700">
                <p>Nav</p>
                <form method="POST" action="{{ route('houses.destroy', $house->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 hover:text-red-400 underline">
                        Delete House
                    </button>
                </form>
            </nav>
            <div class="p-6 text-gray-900 sm:px-6 lg:px-8 ">
                <div>
                    <p class="text-lg mb-2">Members:</p>
                    @foreach ($house->users as $user)
                        <div
                            class="mb-2 flex flex-row justify-between items-center border-2 border-black p-2 h-14 rounded-lg">
                            <div class="flex flex-row items-center justify-start gap-2">
                                <p class="text-lg font-bold">{{$user->username}}</p>
                                <p class="text-gray-700">{{$user->pivot->user_role}}</p>
                            </div>
                            @if ($house->pivot->user_role === 'owner' && $user->id !== $me->id)
                                <form method="POST" action="/houses/kick">
                                    @csrf
                                    <input name="id" value="{{$house->id}}" type="hidden"/>
                                    <input name="user_id" value="{{$user->id}}" type="hidden"/>
                                    <button
                                        class="border-2 border-red-500 rounded-lg hover:text-red-500 p-1 pl-2 pr-2"
                                    >
                                        Kick out
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                    <div class=" mt-3">
                        <form method="POST" action="{{ route('house-invites.store') }}"
                              class="flex flex-col m-auto w-[50%] gap-2">
                            @csrf
                            <input type="hidden" name="house_id" value="{{$house->id}}"/>

                            <div class="flex flex-col gap-1">
                                <label for="username">Invite user</label>
                                <input class="rounded-lg" type="text" name="username" id="username"/>
                                @error('username')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <x-primary-button>Invite</x-primary-button>

                            @if (session()->has('message'))
                                <div>
                                    <p>{{ session()->get('message') }}</p>
                                </div>
                            @endisset
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
