@extends('layouts.app')

@section('page-title')
    Calendar - AKCILS
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
            <!-- Edit calendar  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Edit {{ $calendar->activity }}</h1>
                <div class="p-4">
                <!-- calendar Edit  -->
                <form action="{{ route('calendar-update', $calendar->id) }}" method="POST" class="lg:w-5/6 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="session" class="input-title">Session</label><br>
                        <select name="session" class="input-field">
                            <option value="{{ $calendar->session }}">{{ $calendar->session($calendar->session) }}</option>
                            @foreach($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->session }}</option>
                            @endforeach
                        </select>
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="activity" class="input-title">Activity</label><br>
                        <input type="text" value="{{ $calendar->activity }}" name="activity" placeholder="Activity" class="input-field">
                        @error('activity')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="start_date" class="input-title">Start Date</label><br>
                        <input type="date" value="{{ $calendar->start_date }}" name="start_date" placeholder="Start Date" class="input-field">
                        @error('start_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="input-title">End Date</label><br>
                        <input type="date" value="{{ $calendar->end_date }}" name="end_date" placeholder="End Date" class="input-field">
                        @error('end_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT CALENDAR</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection