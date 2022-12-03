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
    <a href="{{ route('root-department') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.department')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Department
            </span>
        </div>
    </a>
    <!-- Programme  -->
    <a href="{{ route('root-programme') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.department')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Programme
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
                Courses
            </span>
        </div>
    </a>
    <!-- Staff  -->
    <a href="{{ route('root-staff') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.staff')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Staff
            </span>
        </div>
    </a>
    <!-- Student  -->
    <a href="{{ route('root-student') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.student')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Students
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
    <!-- Calendar  -->
    <a href="{{ route('root-calendar') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.timetable')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Calendar
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
    <!-- Exams  -->
    <a href="{{ route('root-exam') }}">
        <div class="nav-link-div">
            <span>
                @include('icons.exams')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Exams
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
@include('includes.root_system_version')