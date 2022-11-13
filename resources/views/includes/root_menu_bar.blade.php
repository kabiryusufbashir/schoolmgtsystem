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
    <!-- Department  -->
    <div class="nav-link-div">
        <span>
            @include('icons.department')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Department
        </span>
    </div>
    <!-- Staff  -->
    <div class="nav-link-div">
        <span>
            @include('icons.staff')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Staff
        </span>
    </div>
    <!-- Student  -->
    <div class="nav-link-div">
        <span>
            @include('icons.student')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Students
        </span>
    </div>
    <!-- Courses  -->
    <div class="nav-link-div">
        <span>
            @include('icons.course')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Courses
        </span>
    </div>
    <!-- Registration  -->
    <div class="nav-link-div">
        <span>
            @include('icons.registration')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Registration
        </span>
    </div>
    <!-- Timetable  -->
    <div class="nav-link-div">
        <span>
            @include('icons.timetable')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Timetable
        </span>
    </div>
    <!-- Exams  -->
    <div class="nav-link-div">
        <span>
            @include('icons.exams')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Exams
        </span>
    </div>
    <!-- Results  -->
    <div class="nav-link-div">
        <span>
            @include('icons.results')
        </span>
        &nbsp;&nbsp;
        <span class="text-sm">
            Results
        </span>
    </div>
    <!-- Settings  -->
    <a href="{{ route('root-settings') }}">
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
<div class="my-10 text-center">
    <div>Version 1.0</div>
    <div class="text-xs">A Product Bitcags IT</div>
</div>