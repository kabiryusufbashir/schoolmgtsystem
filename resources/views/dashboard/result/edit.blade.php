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
            @include('includes.root_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <!-- User Info  -->
            @include('includes.root_user_info')
            <div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>
            <!-- Edit result  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">{{ $student_name }}, <br> {{ $course_name }} <br> {{ $session_year }} 's Result</h1>
                <div class="p-4">
                <!-- result Edit  -->
                <form action="{{ route('result-update', $result->id) }}" method="POST" class="lg:w-5/6 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="ca" class="input-title">CA</label><br>
                        <input type="type" value="{{ $result->ca }}" name="ca" placeholder="CA" class="input-field">
                        @error('ca')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="exams" class="input-title">Exams</label><br>
                        <input type="exams" value="{{ $result->exams }}" name="exams" placeholder="Exams" class="input-field">
                        @error('exams')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT RESULT</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection