@extends('layouts.app')

@section('page-title')
    Registration - AKCILS
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
            <!-- Edit registration  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Edit {{ $registration->title }} Registration</h1>
                <div class="p-4">
                <!-- registration Edit  -->
                <form action="{{ route('registration-update', $registration->id) }}" method="POST" class="lg:w-5/6 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="title" class="input-title">Registration Title</label><br>
                        <input type="text" value="{{ $registration->title }}" name="title" placeholder="Registration Title" class="input-field">
                        @error('title')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="session" class="input-title">Registration Session</label><br>
                        <input type="text" value="{{ $registration->session }}" name="session" placeholder="Registration Session" class="input-field">
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="semester" class="input-title">Registration Semester</label><br>
                        <select name="semester" class="input-field">
                            <option value="{{ $registration->semester }}">{{ $registration->semester }}</option>
                            @if($registration->semester == 'First Semester')
                                <option value="Second Semester">Second Semester</option>
                            @elseif($registration->semester == 'First Semester')
                                <option value="First Semester">First Semester</option>
                            @else
                                <option value="First Semester">First Semester</option>
                                <option value="Second Semester">Second Semester</option>
                            @endif
                        </select>
                        @error('active')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="active" class="input-title">Registration Status</label><br>
                        <select name="active" class="input-field">
                            <option value="{{ $registration->active }}">
                                @if($registration->active == 0)
                                    Not Active
                                @else
                                    Active
                                @endif
                            </option>
                            @if($registration->active == 1)
                                <option value="0">Not Active</option>
                            @else
                                <option value="1">Active</option>
                            @endif
                        </select>
                        @error('active')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT REGISTRATION</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection