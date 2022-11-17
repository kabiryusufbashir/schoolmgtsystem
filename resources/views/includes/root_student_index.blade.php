<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Student</h1>
    <div class="grid grid-cols-3 gap-3 items-center py-3 px-4">
        <!-- Add Student -->
        <a href="{{ route('create-student') }}">
            <div class="settings-menu-div">
                <span class="bg-green-300 p-2 rounded-full">
                    @include('icons.student')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Add Student</h1>
                </span>
            </div>
        </a>
        <!-- All Student -->
        <a href="{{ route('all-student') }}">
            <div class="settings-menu-div">
                <span class="bg-yellow-300 p-2 rounded-full">
                    @include('icons.student')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All Student</h1>
                </span>
            </div>
        </a>
        <!-- Bulk Upload Student -->
        <a href="{{ route('student-bulk-upload') }}">
            <div class="settings-menu-div">
                <span class="bg-blue-300 p-2 rounded-full">
                    @include('icons.student')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Bulk Upload</h1>
                </span>
            </div>
        </a>
    </div>
</div>