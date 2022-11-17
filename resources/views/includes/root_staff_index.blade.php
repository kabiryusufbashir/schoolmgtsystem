<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Staff</h1>
    <div class="grid grid-cols-3 gap-3 items-center py-3 px-4">
        <!-- Add Staff -->
        <a href="{{ route('create-staff') }}">
            <div class="settings-menu-div">
                <span class="bg-green-300 p-2 rounded-full">
                    @include('icons.staff')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Add Staff</h1>
                </span>
            </div>
        </a>
        <!-- All Staff -->
        <a href="{{ route('all-staff') }}">
            <div class="settings-menu-div">
                <span class="bg-yellow-300 p-2 rounded-full">
                    @include('icons.staff')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All Staff</h1>
                </span>
            </div>
        </a>
        <!-- Bulk Upload Staff -->
        <a href="{{ route('staff-bulk-upload') }}">
            <div class="settings-menu-div">
                <span class="bg-blue-300 p-2 rounded-full">
                    @include('icons.staff')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Bulk Upload</h1>
                </span>
            </div>
        </a>
    </div>
</div>