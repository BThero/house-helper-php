<header class="p-1 px-3 h-10 bg-gray-500 flex flex-row justify-between items-center">
    <span class="text-gray-50 text-lg font-bold">{{ $house->city->full_name ?? 'City unknown' }}</span>
    @if($condition)
        <div class="flex flex-row gap-1 items-center">
            <span class="text-gray-50">{{$condition}}</span>
            <span class="text-gray-50">{{$temperature}}°C</span>
        </div>
    @endif
</header>
