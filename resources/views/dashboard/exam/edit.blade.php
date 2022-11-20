@extends('layouts.app')

@section('page-title')
    Exam - AKCILS
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
            <!-- Edit exam  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Edit {{ $exam->session }} {{ $exam->exam_type }}</h1>
                <div class="p-4">
                <!-- exam Edit  -->
                <form action="{{ route('exam-update', $exam->id) }}" method="POST" class="lg:w-5/6 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="session" class="input-title">Session</label><br>
                        <select name="session" class="input-field">
                            <option value="{{ $exam->session }}">{{ $exam->session($exam->session) }}</option>
                            @foreach($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->session }}</option>
                            @endforeach
                        </select>
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="exam_type" class="input-title">Exam Type</label><br>
                        <select name="exam_type" class="input-field">
                            <option value="{{ $exam->exam_type }}">{{ $exam->exam_type }}</option>
                            @if($exam->exam_type == 'CA')
                                <option value="End of Eemester">End of Semester</option>
                            @else
                                <option value="CA">CA</option>
                            @endif
                        </select>
                        @error('exam_type')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="semester" class="input-title">Semester</label><br>
                        <select name="semester" class="input-field">
                            <option value="{{ $exam->semester }}">{{ $exam->semester }}</option>
                            @if($exam->semester == 'First Semester')
                                <option value="Second Semester">Second Semester</option>
                            @else
                                <option value="First Semester">First Semester</option>
                            @endif
                        </select>
                        @error('exam_type')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="start_date" class="input-title">Start Date</label><br>
                        <input type="date" value="{{ $exam->start_date }}" name="start_date" placeholder="Start Date" class="input-field">
                        @error('start_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="input-title">End Date</label><br>
                        <input type="date" value="{{ $exam->end_date }}" name="end_date" placeholder="End Date" class="input-field">
                        @error('end_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT EXAM</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection