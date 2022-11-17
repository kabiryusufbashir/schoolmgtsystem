@extends('layouts.app')

@section('page-title')
    Staff - AKCILS
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
                <!-- Edit Staff  -->
                <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 mb-5 rounded">
                    <h1 class="text-lg font-semibold py-4 w-full">Edit Staff</h1>
                    @if($step == 1)
                        @include('dashboard.staff.edit.step_1')
                    @elseif($step == 2)
                        @include('dashboard.staff.edit.step_2')
                    @elseif($step == 3)
                        @include('dashboard.staff.edit.step_3')
                    @elseif($step == 4)
                        @include('dashboard.staff.edit.step_4')
                    @endif        
                </div>
            </div>
        </div>
    </div>
@endsection