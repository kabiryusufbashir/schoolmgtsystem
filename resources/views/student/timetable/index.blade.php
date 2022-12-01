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
            @include('includes.student_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <!-- User Info  -->
            @include('includes.student_user_info')
            <!-- Timetable  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                @if(count($courses_registered) > 0)
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="w-full"">
                                        <thead class="border-b">
                                            <tr class="text-left whitespace-nowrap border">
                                                <th scope="col" class="px-6 py-2  text-gray-500 border">MONDAY</th>
                                                @foreach($courses_registered as $course)
                                                    @foreach($course->studentTimeTable($course->course_id) as $day)
                                                        @if($day->day == 'Monday')
                                                            @include('includes.student_timetable_template')
                                                        @else
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                            <tr class="text-left whitespace-nowrap border">
                                                <th scope="col" class="px-6 py-2  text-gray-500 border">TUESDAY</th>
                                                @foreach($courses_registered as $course)
                                                    @foreach($course->studentTimeTable($course->course_id) as $day)
                                                        @if($day->day == 'Tuesday')
                                                            @include('includes.student_timetable_template')
                                                        @else
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                            <tr class="text-left whitespace-nowrap border">
                                                <th scope="col" class="px-6 py-2  text-gray-500 border">WEDNESDAY</th>
                                                @foreach($courses_registered as $course)
                                                    @foreach($course->studentTimeTable($course->course_id) as $day)
                                                        @if($day->day == 'Wednesday')
                                                            @include('includes.student_timetable_template')
                                                        @else
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                            <tr class="text-left whitespace-nowrap border">
                                                <th scope="col" class="px-6 py-2  text-gray-500 border">THURSADY</th>
                                                @foreach($courses_registered as $course)
                                                    @foreach($course->studentTimeTable($course->course_id) as $day)
                                                        @if($day->day == 'Thursday')
                                                            @include('includes.student_timetable_template')
                                                        @else
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                            <tr class="text-left whitespace-nowrap border">
                                                <th scope="col" class="px-6 py-2  text-gray-500 border">FRIDAY</th>
                                                @foreach($courses_registered as $course)
                                                    @foreach($course->studentTimeTable($course->course_id) as $day)
                                                        @if($day->day == 'Friday')
                                                            @include('includes.student_timetable_template')
                                                        @else
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                            <tr class="text-left whitespace-nowrap border">
                                                <th scope="col" class="px-6 py-2  text-gray-500 border">SATURDAY</th>
                                                @foreach($courses_registered as $course)
                                                    @foreach($course->studentTimeTable($course->course_id) as $day)
                                                        @if($day->day == 'Saturday')
                                                            @include('includes.student_timetable_template')
                                                        @else
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                            
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <h1 class="text-lg font-semibold py-4 w-full">No Timetable Found</h1>
                @endif
            </div>
        </div>
    </div>
@endsection