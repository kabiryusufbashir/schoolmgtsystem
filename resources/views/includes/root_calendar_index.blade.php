<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Course</h1>
    <div class="grid grid-cols-3 gap-3 items-center py-3 px-4">
        <!-- Add Course -->
        <div id="addCourseLink" class="settings-menu-div">
            <span class="bg-green-300 p-2 rounded-full">
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Add Course</h1>
            </span>
        </div>
        <!-- All Course -->
        <a href="{{ route('all-course') }}">
            <div class="settings-menu-div">
                <span class="bg-yellow-300 p-2 rounded-full">
                    @include('icons.course')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All Course</h1>
                </span>
            </div>
        </a>
    </div>
</div>