<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Registration</h1>
    <div class="items-center py-3 px-4">
        <!-- Add Registration -->
        <div id="addRegistrationLink" class="settings-menu-div">
            <span class="bg-green-300 p-2 rounded-full">
                @include('icons.registration')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Add Registration</h1>
            </span>
        </div>
        <!-- All registration -->
        <a href="{{ route('all-registration') }}">
            <div class="settings-menu-div">
                <span class="bg-yellow-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All Registration</h1>
                </span>
            </div>
        </a>
        <!-- All registration -->
        <a href="{{ route('check-payment-session') }}">
            <div class="settings-menu-div">
                <span class="bg-blue-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Confirm Session Payment</h1>
                </span>
            </div>
        </a>
        <!-- All registration -->
        <a href="{{ route('check-payment-semester') }}">
            <div class="settings-menu-div">
                <span class="bg-green-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Confirm Departmental Fee Payment</h1>
                </span>
            </div>
        </a>
        <!-- Add Student Registration -->
        <div id="addStudentRegistrationLink" class="settings-menu-div">
            <span class="bg-green-300 p-2 rounded-full">
                @include('icons.registration')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Add Student Registration</h1>
            </span>
        </div>
    </div>
</div>