@extends('layouts.app')

@section('page-title')
    Timetable - AKCILS
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
            <!-- Edit timetable  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Edit {{ $timetable->venue }}</h1>
                <div class="p-4">
                <!-- timetable Edit  -->
                <form action="{{ route('timetable-update', $timetable->id) }}" method="POST" class="lg:w-5/6 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="session" class="input-title">Session</label><br>
                        <select name="session" class="input-field">
                            <option value="{{ $timetable->session }}">{{ $timetable->session($timetable->session) }}</option>
                            @foreach($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->session }}</option>
                            @endforeach
                        </select>
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="course" class="input-title">Course</label><br>
                        <select name="course" class="input-field">
                            <option value="{{ $timetable->course }}">{{ $timetable->course($timetable->course) }}</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_code }} - {{ $course->name }}{{ $course->course }}</option>
                            @endforeach
                        </select>
                        @error('course')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="venue" class="input-title">Venue</label><br>
                        <input type="text" value="{{ $timetable->venue }}" name="venue" placeholder="venue" class="input-field">
                        @error('venue')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="day" class="input-title">Day</label><br>
                        <select name="day" class="input-field">
                            <option value="{{ $timetable->day }}">{{ $timetable->day }}</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        @error('day')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="start_date" class="input-title">Start Time</label><br>
                        <input type="time" value="{{ $timetable->start_date }}" name="start_date" placeholder="Start Time" class="input-field">
                        @error('start_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="input-title">End Time</label><br>
                        <input type="time" value="{{ $timetable->end_date }}" name="end_date" placeholder="End Time" class="input-field">
                        @error('end_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT TIMETABLE</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection