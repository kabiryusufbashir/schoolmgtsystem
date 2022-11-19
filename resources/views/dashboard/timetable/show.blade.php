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
                <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                    <h1 class="text-lg font-semibold py-4 w-full">{{ $course }} Timetable</h1>
                    @if(count($timetables) > 0)
                        <div class="flex justify-between py-4">
                            <div>Day</div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        @foreach($timetables as $timetable)
                            <div class="flex justify-between py-4 border-t">
                                <div>{{ $timetable->day }}</div>
                                <div>{{ $timetable->venue }}</div>
                                <div>{{ $timetable->start_date }}</div>
                                <div>{{ $timetable->end_date }}</div>
                                <div>
                                    <span class="flex">
                                        <form action="{{ route('timetable-edit', $timetable->id) }}" method="GET">
                                            @csrf 
                                            <input type="submit" value="EDIT" class="edit-btn">
                                        </form>
                                        &nbsp;&nbsp;
                                        <form action="{{ route('timetable-delete', $timetable->id) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <input type="submit" value="DELETE" class="del-btn">
                                        </form>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1 class="text-lg font-semibold py-4 w-full">No Timetable Found</h1>
                    @endif
                </div>
        </div>
    </div>
@endsection