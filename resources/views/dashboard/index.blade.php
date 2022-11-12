@extends('layouts.app')

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white col-span-1">
            <div class="py-7">
                <!-- logo  -->
                <div>
                    <img class="w-1/2 mx-auto" src="{{ asset('images/logo.png') }}" alt="School Logo">
                </div>
                <!-- School Title  -->
                <div>
                    <h1 class="text-center font-semibold">AMINU KANO <br>COLLEGE OF ISLAMIC<br>AND LEGAL STUDIES</h1>
                </div>
            </div>
            <!-- Menu Bar  -->
            @include('includes.root_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <!-- User Info  -->
            @include('includes.root_user_info')
            <!-- System Statistics -->
            @include('includes.root_system_stat')
            <!-- Calendar  -->
            @include('includes.root_system_calendar')
        </div>
    </div>
@endsection