<div class="my-4 overflow-auto yus-container-scrollbar py-3">
    <!-- Dashboard  -->
    <a href="{{ route('dashboard') }}">
        <div class="bg-green-600 text-white rounded flex items-center px-4 py-2 mx-7 mb-4 cursor-pointer">
            <span>
                @include('icons.dashboard')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Dashboard
            </span>
        </div>
    </a>
    <!-- Courses  -->
    <a href="{{ route('root-course') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Course Reg.
            </span>
        </div>
    </a>
    <!-- Registration  -->
    <a href="{{ route('root-registration') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.registration')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Registration
            </span>
        </div>
    </a>
    <!-- Timetable  -->
    <a href="{{ route('root-timetable') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.timetable')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Timetable
            </span>
        </div>
    </a>
    <!-- Results  -->
    <a href="{{ route('root-result') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.results')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Results
            </span>
        </div>
    </a>
    <!-- Settings  -->
    <a href="{{ route('student-settings') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.settings')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Settings
            </span>
        </div>
    </a>
    <!-- Logout  -->
    <a href="{{ route('logout') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.logout')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Logout
            </span>
        </div>
    </a>
</div>
<!-- Version  -->
@include('includes.root_system_version')