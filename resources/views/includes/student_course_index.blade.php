<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Course</h1>
    <!-- Course Reg.  -->
    <a href="{{ route('student-course-registration') }}">
        <div class="settings-menu-div">
            <span class="bg-gray-300 px-2 py-3 rounded-full">
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Course Registration</h1>
            </span>
        </div>
    </a>
    <!-- Course -->
    <div class="settings-menu-div">
        <span class="bg-gray-300 px-2 py-3 rounded-full">
            @include('icons.course')
        </span>
        &nbsp;&nbsp;
        <span>
            <h1>View Courses</h1>
        </span>
    </div>
</div>