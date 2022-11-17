@extends('layouts.app')

@section('page-title')
    Departments - AKCILS
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
            <!-- Edit Department  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Edit {{ $dept->name }} Department</h1>
                <div class="p-4">
                <!-- Department Edit  -->
                <form action="{{ route('dept-update', $dept->id) }}" method="POST" class="lg:w-1/2 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name" class="input-title">Department Name</label><br>
                        <input type="text" value="{{ $dept->name }}" name="name" placeholder="Department Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="my-3">
                        <label for="hod" class="input-title">HOD</label><br>
                        <select name="hod" class="input-field">
                            <option value="{{ $dept->hod }}">{{ $dept->staffFullName($dept->hod) }}</option>
                            @foreach($staff as $hod)
                                <option value="{{ $hod->user_id }}">{{ $hod->fullName($hod->user_id) }}</option>
                            @endforeach
                        </select>
                    </div>     
                    <div class="my-3">
                        <label for="level_coordinator" class="input-title">Level Coordinator</label><br>
                        <select name="level_coordinator" class="input-field">
                            <option value="{{ $dept->level_coordinator }}">{{ $dept->staffFullName($dept->level_coordinator) }}</option>
                            @foreach($staff as $level_coordinator)
                                <option value="{{ $level_coordinator->user_id }}">{{ $level_coordinator->fullName($level_coordinator->user_id) }}</option>
                            @endforeach
                        </select>
                    </div>     
                    <div class="my-3">
                        <label for="exam_officer" class="input-title">Exam Officer</label><br>
                        <select name="exam_officer" class="input-field">
                            <option value="{{ $dept->exam_officer }}">{{ $dept->staffFullName($dept->exam_officer) }}</option>
                            @foreach($staff as $exam_officer)
                                <option value="{{ $exam_officer->user_id }}">{{ $exam_officer->fullName($exam_officer->user_id) }}</option>
                            @endforeach
                        </select>
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT DEPARTMENT</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection