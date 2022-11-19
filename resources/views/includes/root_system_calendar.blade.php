<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 mb-5 rounded">
    <h1 class="text-lg font-semibold py-4">Calendar</h1>
        @if(count($calendars) > 0)
            @foreach($calendars as $calendar)
                <div class="grid grid-cols-5 gap-3 border-t items-center py-3 hover:bg-green-600 hover:text-white px-4">
                    <div class="col-span-1">
                        <div>{{ $calendar->dateFormat($calendar->start_date) }}</div>
                        <div class="text-center">to</div>
                        <div>{{ $calendar->dateFormat($calendar->end_date) }}</div>
                    </div>
                    <div class="col-span-4">
                        <div class="font-semibold">{{ $calendar->activity }}</div>
                    </div>
                </div>
            @endforeach
        @else
            <h1 class="text-lg font-semibold py-4 w-full">No Calendar Found</h1>
        @endif
</div>