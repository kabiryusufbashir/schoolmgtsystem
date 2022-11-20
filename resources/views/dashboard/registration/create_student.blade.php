<div id="addStudentRegistration" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Registration</span>
                <span id="closeModaladdStudentRegistration" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Registration Create  -->
                <form action="{{ route('student-registration-create') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="session" class="input-title">Session</label><br>
                        <select name="session" class="input-field">
                            <option value=""></option>
                            @foreach($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->session }}</option>
                            @endforeach
                        </select>
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="semester" class="input-title">Semester</label><br>
                        <select name="semester" class="input-field">
                            <option value=""></option>
                            <option value="First Semester">First Semester</option>
                            <option value="Second Semester">Second Semester</option>
                        </select>
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="course_id" class="input-title">Course</label><br>
                        <select name="course_id" class="input-field">
                            <option value=""></option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->courseName($course->id) }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            {{$message}}
                        @enderror
                    </div>     
                    <div>
                        <label for="student_id" class="input-title">Student</label><br>
                        <select name="student_id" class="input-field">
                            <option value=""></option>
                            @foreach($students as $student)
                                <option value="{{ $student->user_id }}">{{ $student->matric_no }}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">ADD REGISTRATION</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Department 
    let addStudentRegistrationLink = document.querySelector('#addStudentRegistrationLink')
    let addStudentRegistration = document.querySelector('#addStudentRegistration')
    let closeModaladdStudentRegistration = document.querySelector('#closeModaladdStudentRegistration')

    addStudentRegistrationLink.addEventListener('click', ()=>{
        if(addStudentRegistration.classList.contains('hidden')){
            addStudentRegistration.classList.remove('hidden');
        }else{
            addStudentRegistration.classList.add('hidden');
        }
    })

    closeModaladdStudentRegistration.addEventListener('click', ()=>{
        if(addStudentRegistration.classList.contains('hidden')){
            addStudentRegistration.classList.remove('hidden');
        }else{
            addStudentRegistration.classList.add('hidden');
        }
    })
</script>