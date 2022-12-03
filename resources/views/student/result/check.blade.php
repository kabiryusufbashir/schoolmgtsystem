@extends('layouts.app')

@section('page-title')
    Result - AKCILS
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
            <h1 class="text-lg font-semibold px-6">Result</h1>
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <div class="font-semibold">Session</div> &nbsp;&nbsp; 
                        <div class="border p-2 rounded cursor-pointer">{{ $student_online->sessionYear($session_id) }}</div>
                    </div>
                    <div class="flex">
                        <div>
                            <form action="{{ route('student-result-print') }}" method="POST">
                                @csrf
                                <input type="text" value="{{ $session_id }}" style="display:none;" name="session">
                                <input type="text" value="{{ $semester }}" style="display:none;" name="semester">
                                <button class="bg-green-700 text-white py-2 px-4 rounded cursor-pointer border">
                                    Print Result
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Semester  -->
                @if(count($results) > 0)
                    <div class="my-3">
                        <h2 class="font-semibold">{{ $semester }}' Result</h2>
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="w-full"">
                                                <thead class="border-b-2">
                                                    <tr class="text-left whitespace-nowrap">
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            TITLE
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            UNIT
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            CA
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            EXAMS
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            PERCENTAGE SCORE
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            GRADE
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            GRADE POINT
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            CUMULATIVE WEIGHT
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($results as $course)
                                                        <tr class="">
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->courseName($course->course) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->courseUnit($course->course) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->ca }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->exams }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->resultPercentageScore($course->id) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->resultGrade($course->id) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->resultGradePoint($course->id) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->cumulativeWeight($course->id) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach  
                                                    <tr>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                            {{ $student_online->creditUnit($student_online->user_id, $session_id, $semester) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">
                                                            {{ $student_online->cumulativeWeight($student_online->user_id, $session_id, $semester) }}
                                                        </td>
                                                    </tr>   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <h2 class="font-semibold p-2 border">GPA = Total Weight Points / Total Credit Units</h2>
                        <h2 class="font-semibold p-2 border">GPA = {{ $student_online->cumulativeWeight($student_online->user_id, $session_id, $semester) }} / {{ $student_online->creditUnit($student_online->user_id, $session_id, $semester) }}</h2>
                        <h2 class="font-semibold p-2 border">GPA = {{ round($student_online->cumulativeWeight($student_online->user_id, $session_id, $semester) / $student_online->creditUnit($student_online->user_id, $session_id, $semester), 2) }}</h2>
                    </div>
                @else
                    <h1 class="text-lg font-semibold py-4 w-full">No Course Found</h1>
                @endif
            </div>
        </div>
    </div>
@endsection