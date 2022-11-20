@extends('layouts.app')

@section('page-title')
    Insert Result - AKCILS
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
            <!-- Edit result  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Add {{ $course_name }} {{ $semester }}'s Result</h1>
                <div class="p-4">
                <!-- Result Add  -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="w-full"">
                                    <thead class="border-b">
                                        <tr class="text-left whitespace-nowrap">
                                            <th scope="col" class="px-6 py-2  text-gray-500">
                                                MATRIC NO
                                            </th>
                                            <th scope="col" class="px-6 py-2  text-gray-500">
                                                CA
                                            </th>
                                            <th scope="col" class="px-6 py-2  text-gray-500">
                                                EXAMS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="{{ route('submit-result') }}" method="POST">
                                            @csrf 
                                            <input style="float:right;" type="submit" value="SUBMIT" class="edit-btn">
                                            @foreach($students as $student)
                                                <tr class="divide-y divide-gray-300 border-b-2">
                                                    <td class="px-6 py-4 text-sm text-gray-500">
                                                        {{ $student->studentMatricNo($student->student_id) }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500">
                                                        <input style="display:none;" value="{{ $session_year }}" name="session" class="input-field">
                                                        <input style="display:none;" value="{{ $semester }}" name="semester" class="input-field">
                                                        <input style="display:none;" value="{{ $course_name }}" name="course" class="input-field">
                                                        <input style="display:none;" value="{{ $student->student_id }}" name="student_id[]" class="input-field">
                                                        <input type="text" name="ca[]" class="input-field">
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500">
                                                        <input type="text" name="exams[]" class="input-field">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection