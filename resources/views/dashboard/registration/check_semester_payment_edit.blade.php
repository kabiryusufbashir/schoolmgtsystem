@extends('layouts.app')

@section('page-title')
    Payment - AKCILS
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
            <!-- Edit check_payment  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Confirm {{ $check_payment->studentName($check_payment->student_id) }} Payment</h1>
                <div class="p-4">
                <!-- check_payment Edit  -->
                <form action="{{ route('check-payment-semester-update', $check_payment->id) }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name" class="text-lg font-medium border-b-4 border-green-700">{{ $check_payment->session($check_payment->session) }} Session <br> {{ $check_payment->semester }}'s Receipt</label><br>
                        <div class="grid grid-cols-2 gap-2 items-center mt-3">
                            <div class="mr-4">
                                <img class="w-full" src="{{ $check_payment->proof_of_payment }}" alt="{{ $check_payment->studentName($check_payment->student_id) }} Receipt">
                            </div>
                        </div>
                        @error('proof_of_payment')
                            {{$message}}
                        @enderror
                    </div> 
                    <div class="text-center my-4">
                        <button class="submit-btn">CONFIRM PAYMENT</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection