@extends('layouts.app')

@section('page-title')
    Student - AKCILS
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        {{--@if(Auth::guard('students')->user()->checkPayment() == 0)
            @include('student.payment_check')
        @endif--}}
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
            <!-- System Statistics -->
            @include('includes.student_system_stat')
            <!-- Calendar  -->
            @include('includes.student_system_calendar')
        </div>
    </div>
@endsection