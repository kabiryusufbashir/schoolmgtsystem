<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Settings</h1>
    <div class="grid grid-cols-3 gap-3 items-center py-3 px-4">
        <!-- Profile Photo  -->
        <div id="systemPhotoLink" class="settings-menu-div">
            <span class="bg-yellow-300 p-2 rounded-full">
                @include('icons.photo')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Update Profile Picture</h1>
            </span>
        </div>
        <!-- Reset Password  -->
        <div id="systemPasswordLink" class="settings-menu-div">
            <span class="bg-gray-300 p-2 rounded-full">
                @include('icons.password')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Reset Password</h1>
            </span>
        </div>
    </div>
</div>