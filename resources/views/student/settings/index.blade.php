@extends('layouts.app')

@section('page-title')
    Settings - AKCILS
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
            <div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>
            <!-- Settings Menu  -->
            @include('includes.student_settings_index')
        </div>
        <!-- System Photo  -->
        @include('student.settings.student_photo')
        <!-- System Password  -->
        @include('student.settings.student_password')
    </div>
@endsection