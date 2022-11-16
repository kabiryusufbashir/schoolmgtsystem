@extends('layouts.app')

@section('page-title')
    Course - AKCILS
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white col-span-1">
            @include('includes.root_system_info')
            <!-- Menu Bar  -->
            @include('includes.root_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <!-- User Info  -->
            @include('includes.root_user_info')
            <div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>
            <!-- Edit Course  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Edit {{ $course->name }} Course</h1>
                <div class="p-4">
                <!-- Course Edit  -->
                <form action="{{ route('course-update', $course->id) }}" method="POST" class="lg:w-5/6 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="text-lg font-medium">Course Name</label><br>
                            <input type="text" value="{{ $course->name }}" name="name" placeholder="Course Name" class="input-field">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="course_type" class="text-lg font-medium">Course Type</label><br>
                            <select name="course_type" placeholder="Course Type" class="input-field">
                                <option value="{{ $course->course_type }}">{{ $course->course_type }}</option>
                                @if($course->course_type == 'Core')
                                    <option value="Elective">Elective</option>
                                    @elseif($course->course_type == 'Elective')
                                    <option value="Core">Core</option>
                                @else
                                    <option value="Elective">Elective</option>
                                    <option value="Core">Core</option>
                                @endif
                            </select>
                            @error('course_type')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 my-3">
                        <div>
                            <label for="course_code" class="text-lg font-medium">Course Code</label><br>
                            <input type="text" value="{{ $course->code }}" name="course_code" placeholder="Course Code" class="input-field">
                            @error('course_code')
                                {{$message}}
                            @enderror
                        </div>
                        <div>
                            <label for="course_unit" class="text-lg font-medium">Course Unit</label><br>
                            <input type="text" value="{{ $course->unit }}" name="course_unit" placeholder="Course Unit" class="input-field">
                            @error('course_unit')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="name" class="text-lg font-medium">Department Name</label><br>
                        <select name="department" class="input-field">
                            <option value="{{ $course->department}}">{{ $course->department($course->department) }}</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT COURSE</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection