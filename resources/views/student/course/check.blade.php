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
                        <div class="border p-2 rounded cursor-pointer">{{ $student_online->sessionYear($session_id) }}</div>
                    </div>
                    <div class="flex">
                        <div>
                            <form action="{{ route('student-course-registration-print') }}" method="POST">
                                @csrf
                                <input type="text" value="{{ $session_id }}" style="display:none;" name="session">
                                <input type="text" value="{{ $semester }}" style="display:none;" name="semester">
                                <button class="bg-green-700 text-white py-2 px-4 rounded cursor-pointer border">
                                    Print Slip
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- First Semester  -->
                @if(count($courses_registered) > 0)
                    <div class="my-3">
                        <h2 class="font-semibold">{{ $semester }}</h2>
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
                                                    @foreach($courses_registered as $course)
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
                                                        </tr>
                                                    @endforeach     
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                @else
                    <h1 class="text-lg font-semibold py-4 w-full">No Course Found</h1>
                @endif
            </div>
        </div>
    </div>
@endsection