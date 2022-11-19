<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Calendar</h1>
    <div class="grid grid-cols-3 gap-3 items-center py-3 px-4">
        <!-- Add calendar -->
        <div id="addCalendarLink" class="settings-menu-div">
            <span class="bg-green-300 p-2 rounded-full">
                @include('icons.timetable')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Add calendar</h1>
            </span>
        </div>
        <!-- All calendar -->
        <a href="{{ route('all-calendar') }}">
            <div class="settings-menu-div">
                <span class="bg-yellow-300 p-2 rounded-full">
                    @include('icons.timetable')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All calendar</h1>
                </span>
            </div>
        </a>
    </div>
</div>