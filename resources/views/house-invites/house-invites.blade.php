<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your invites
        </h2>
        <p>
            All invites you received from other users to join their houses
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <h3 class="mb-2">You have {{count($invites)}} pending invites.</h3>
                        @foreach ($invites as $invite)
                            <div
                                class="mb-2 flex flex-row justify-between items-center border-2 border-black p-2 rounded-lg">
                                <div class="flex flex-row items-center justify-start gap-2">
                                    <p class="text-lg font-bold">{{$invite->house->name}}</p>
                                    <p class="text-gray-700">#{{$invite->house->id}}</p>
                                </div>
                                <div class="flex flex-row items-center justify-start gap-2">
                                    <form method="POST" action="{{ route('house-invites.destroy', $invite->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="accepted" value="yes"/>
                                        <x-primary-button>Accept</x-primary-button>
                                    </form>
                                    <form method="POST" action="{{ route('house-invites.destroy', $invite->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="accepted" value="no"/>
                                        <x-primary-button>Decline</x-primary-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
