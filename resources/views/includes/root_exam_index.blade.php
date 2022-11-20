<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Exam</h1>
    <div class="grid grid-cols-3 gap-3 items-center py-3 px-4">
        <!-- Add Exam -->
        <div id="addExamLink" class="settings-menu-div">
            <span class="bg-green-300 p-2 rounded-full">
                @include('icons.timetable')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Add Exam</h1>
            </span>
        </div>
        <!-- All Exam -->
        <a href="{{ route('all-exam') }}">
            <div class="settings-menu-div">
                <span class="bg-yellow-300 p-2 rounded-full">
                    @include('icons.timetable')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All Exam</h1>
                </span>
            </div>
        </a>
    </div>
</div>