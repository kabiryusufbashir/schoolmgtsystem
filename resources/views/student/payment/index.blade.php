@extends('layouts.app')

@section('page-title')
    Make Payment - AKCILS
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
            <!-- Settings Menu  -->
            @include('includes.student_payment_index')
        </div>
    </div>
@endsection