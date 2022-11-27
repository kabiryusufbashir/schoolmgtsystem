@extends('layouts.app')

@section('page-title')
    Register Course - AKCILS
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white col-span-1">
            @include('includes.root_system_info')
            <!-- Menu Bar  -->
            @include('includes.student_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <!-- User Info  -->
            @include('includes.student_user_info')
            <!-- Register Course  -->
            <h1 class="text-lg font-semibold px-6">Course Registration</h1>
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <div class="font-semibold">Session</div> &nbsp;&nbsp; 
                        <div class="border p-2 rounded cursor-pointer">{{ $session }}</div>
                    </div>
                    <div class="flex">
                        <div id="addCourseBtn">
                            <div class="bg-green-700 text-white py-2 px-4 rounded cursor-pointer border">
                                Add Course
                            </div>
                        </div>
                        &nbsp;
                        <div id="submitBtn">
                            <div class="bg-blue-700 text-white py-2 px-4 rounded cursor-pointer border">
                                Submit Registration
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div>
                        <svg width="22" height="22" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 32.8334C25.7445 32.8334 32.8333 25.7446 32.8333 17.0001C32.8333 8.25557 25.7445 1.16675 17 1.16675C8.25545 1.16675 1.16663 8.25557 1.16663 17.0001C1.16663 25.7446 8.25545 32.8334 17 32.8334Z" stroke="#F00E0E" stroke-width="2"/>
                            <path d="M17 9.0835V18.5835M17 24.1252V24.9168" stroke="#F00E0E" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    &nbsp;
                    <div class="text-red-700 text-sm">
                        Instruction: Click on the delete button to remove a course
                    </div>
                </div>
                <!-- First Semester  -->
                @if(count($first_semester_courses) > 0)
                <div class="my-3">
                    <h2 class="font-semibold">First Semester</h2>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-full"">
                                            <thead class="border-b-2">
                                                <tr class="text-left whitespace-nowrap">
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        TYPE
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        COURSE CODE
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        TITLE
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        UNIT
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($first_semester_courses as $course)
                                                    <tr class="">
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseType($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseCode($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseName($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseUnit($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            <span class="flex">
                                                                <form action="{{ route('student-course-registration-delete', $course->id) }}" method="POST">
                                                                    @csrf 
                                                                    @method('DELETE')
                                                                    <input type="submit" value="REMOVE" class="del-btn">
                                                                </form>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach     
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <hr>
                @endif
                @if(count($second_semester_courses) > 0)
                <!-- Second Semester  -->
                <div class="my-3">
                    <h2 class="font-semibold">Second Semester</h2>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-full"">
                                            <thead class="border-b-2">
                                                <tr class="text-left whitespace-nowrap">
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        TYPE
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        COURSE CODE
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        TITLE
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        UNIT
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($second_semester_courses as $course)
                                                    <tr class="">
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseType($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseCode($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseName($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $course->courseUnit($course->course_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            <span class="flex">
                                                                <form action="{{ route('student-course-registration-delete', $course->id) }}" method="POST">
                                                                    @csrf 
                                                                    @method('DELETE')
                                                                    <input type="submit" value="REMOVE" class="del-btn">
                                                                </form>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div id="addCourse" class="hidden">
        <div id="modal">
            <div id="modal-content" class="rounded">
                <div id="modal-header" class="modal-header">
                    <span>Select Course</span>
                    <span id="closeModalAddCourse" class="cursor-pointer">X</span>
                </div>
                <div class="p-4">
                    <!-- Add Course  -->
                    <form action="{{ route('student-course-registration-submit') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                        @csrf
                        <div class="my-3">
                            <input hidden value="{{ $session_id }}" class="input-field" type="text" name="session">
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
                        <div class="my-3">
                            <label for="course" class="input-title">Course</label><br>
                            <select class="input-field" name="course">
                                <option value=""></option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_code }} - {{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course')
                                {{$message}}
                            @enderror
                        </div>     
                        <div class="text-center my-4">
                            <button class="submit-btn">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="submitRegistration" class="hidden">
        <div id="modal">
            <div id="modal-content" class="rounded">
                <div id="modal-header" class="modal-header">
                    <span>Submit Course Registration</span>
                    <span class="closeModalSubmitRegistration cursor-pointer">X</span>
                </div>
                <div class="p-4 flex px-6 lg:px-8 mx-auto items-center justify-between">
                    <!-- Add Submit  -->
                    <div>
                        Are you sure you want to submit?
                    </div>
                    <div class="flex">
                        <div>
                            <form action="{{ route('student-course-registration-completed') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="text-center my-4">
                                    <button class="bg-green-700 text-white py-2 px-4 rounded cursor-pointer border">YES</button>
                                </div>
                            </form>
                        </div>
                        &nbsp;&nbsp;
                        <div class="text-center my-4">
                            <button class="closeModalSubmitRegistration bg-red-700 text-white py-2 px-4 rounded cursor-pointer border">NO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add Course 
        let addCourseLink = document.querySelector('#addCourseBtn')
        let AddCourse = document.querySelector('#addCourse')
        let closeModalAddCourse = document.querySelector('#closeModalAddCourse')

        addCourseLink.addEventListener('click', ()=>{
            if(AddCourse.classList.contains('hidden')){
                AddCourse.classList.remove('hidden');
            }else{
                AddCourse.classList.add('hidden');
            }
        })

        closeModalAddCourse.addEventListener('click', ()=>{
            if(AddCourse.classList.contains('hidden')){
                AddCourse.classList.remove('hidden');
            }else{
                AddCourse.classList.add('hidden');
            }
        })

        // Submit Registration 
        let submitBtn = document.querySelector('#submitBtn')
        let submitRegistration = document.querySelector('#submitRegistration')
        let closeModalSubmitRegistration = document.querySelector('.closeModalSubmitRegistration')

        submitBtn.addEventListener('click', ()=>{
            if(submitRegistration.classList.contains('hidden')){
                submitRegistration.classList.remove('hidden');
            }else{
                submitRegistration.classList.add('hidden');
            }
        })

        closeModalSubmitRegistration.addEventListener('click', ()=>{
            if(submitRegistration.classList.contains('hidden')){
                submitRegistration.classList.remove('hidden');
            }else{
                submitRegistration.classList.add('hidden');
            }
        })
    </script>
@endsection