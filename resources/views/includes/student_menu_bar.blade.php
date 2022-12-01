<div class="my-4 overflow-auto yus-container-scrollbar py-3">
    <!-- Dashboard  -->
    <a href="{{ route('student-dashboard') }}">
        <div class="{{ ($page_title == 'dashboard') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.dashboard')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Dashboard
            </span>
        </div>
    </a>
    <!-- Make Payment  -->
    <a href="{{ route('student-payment') }}">
        <div class="{{ ($page_title == 'payment') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Make Payment
            </span>
        </div>
    </a>
    <!-- Courses  -->
    <a href="{{ route('student-course-reg') }}">
        <div class="{{ ($page_title == 'course') ? 'active-nav-link-div' : 'nav-link-div' }}">
            <span>
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span class="text-sm">
                Course Reg.
            </span>
        </div>
    </a>
    <!-- Timetable  -->
    <a href="{{ route('student-timetable') }}">
        <div class="{{ ($page_title == 'timetable') ? 'active-nav-link-div' : 'nav-link-div' }}">
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
    <a href="{{ route('student-result') }}">
        <div class="{{ ($page_title == 'result') ? 'active-nav-link-div' : 'nav-link-div' }}">
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
        <div class="{{ ($page_title == 'settings') ? 'active-nav-link-div' : 'nav-link-div' }}">
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