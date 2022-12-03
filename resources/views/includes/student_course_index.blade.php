<h1 class="text-lg font-semibold px-6">Course</h1>
<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
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
    @if($student_online->checkCourseRegistered() == 1)
    <!-- Course -->
    <div id="checkCourseBtn" class="settings-menu-div">
        <span class="bg-gray-300 px-2 py-3 rounded-full">
            @include('icons.course')
        </span>
        &nbsp;&nbsp;
        <span>
            <h1>View Courses Registered</h1>
        </span>
    </div>
    @endif
</div>

@if($student_online->checkCourseRegistered() == 1)
<div id="checkCourse" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Check Course Registered</span>
                <span id="closeModalcheckCourse" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Check Course  -->
                <form action="{{ route('student-course-registration-check') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label for="session" class="input-title">Session</label><br>
                        <select class="input-field" name="session">
                            <option value=""></option>
                            @foreach($student_online->sessionRegistered() as $session)
                                <option value="{{ $session->session }}">{{ $student_online->sessionYear($session->session) }}</option>
                            @endforeach
                        </select>
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="session" class="input-title">Semester</label><br>
                        <select class="input-field" name="semester">
                            <option value=""></option>
                            <option value="First Semester">First Semester</option>
                            <option value="Second Semester">Second Semester</option>
                        </select>
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">CHECK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    // Check Course 
    let checkCourseLink = document.querySelector('#checkCourseBtn')
    let checkCourse = document.querySelector('#checkCourse')
    let closeModalcheckCourse = document.querySelector('#closeModalcheckCourse')

    checkCourseLink.addEventListener('click', ()=>{
        if(checkCourse.classList.contains('hidden')){
            checkCourse.classList.remove('hidden');
        }else{
            checkCourse.classList.add('hidden');
        }
    })

    closeModalcheckCourse.addEventListener('click', ()=>{
        if(checkCourse.classList.contains('hidden')){
            checkCourse.classList.remove('hidden');
        }else{
            checkCourse.classList.add('hidden');
        }
    })
</script>