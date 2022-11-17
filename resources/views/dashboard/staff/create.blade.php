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
                <!-- Add Staff  -->
                <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 mb-5 rounded">
                    <h1 class="text-lg font-semibold py-4 w-full">Add Staff</h1>
                    <div class="mb-4">
                        <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 1: Personal Data /</span>
                        <span>Step 2: Contact Address /</span>
                        <span>Step 3: Educational Qualification /</span>
                        <span>Step 4: Photo & Department</span>
                    </div>
                    <div class="py-4 lg:w-1/3">
                        <!-- Staff Add  -->
                        <form action="{{ route('add-staff') }}" method="POST">
                            @csrf
                            <!-- title  -->
                            <div class="my-4">
                                <label for="title" class="input-title">Title</label><br>
                                <select name="title" class="input-field">
                                    <option value=""></option>
                                    <option value="Mal">Mal</option>
                                    <option value="Malama">Malama</option>
                                    <option value="Alhaji">Alhaji</option>
                                    <option value="Hajiya">Hajiya</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Prof">Prof</option>
                                </select>
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                            <!-- First Name  -->
                            <div class="my-4">
                                <label for="first_name" class="input-title">First Name</label><br>
                                <input type="text" name="first_name" placeholder="First Name" class="input-field">
                                @error('first_name')
                                    {{$message}}
                                @enderror
                            </div>
                            <!-- Last Name  -->
                            <div class="my-4">
                                <label for="last_name" class="input-title">Last Name</label><br>
                                <input type="text" name="last_name" placeholder="Last Name" class="input-field">
                                @error('last_name')
                                    {{$message}}
                                @enderror
                            </div>
                            <!-- Other Name  -->
                            <div class="my-4">
                                <label for="other_name" class="input-title">Other Name</label><br>
                                <input type="text" name="other_name" placeholder="Other Name" class="input-field">
                                @error('other_name')
                                    {{$message}}
                                @enderror
                            </div>
                            <!-- Email Address  -->
                            <div class="my-4">
                                <label for="email" class="input-title">Email Address</label><br>
                                <input type="email" name="email" placeholder="Email Address" class="input-field">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                            <!-- Gender  -->
                            <div class="my-4">
                                <label for="gender" class="input-title">Gender</label><br>
                                <select name="gender" class="input-field">
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    {{$message}}
                                @enderror
                            </div>
                            <!-- DOB  -->
                            <div class="my-4">
                                <label for="dob" class="input-title">Date of Birth</label><br>
                                <input type="date" name="dob" placeholder="Date of Birth" class="input-field">
                                @error('dob')
                                    {{$message}}
                                @enderror
                            </div>
                            <!-- Marital Status  -->
                            <div class="my-4">
                                <label for="marital_status" class="input-title">Marital Status</label><br>
                                <select name="marital_status" class="input-field">
                                    <option value=""></option>
                                    <option value="Male">Single</option>
                                    <option value="Female">Married</option>
                                    <option value="Female">Divorced</option>
                                </select>
                                @error('marital_status')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="text-center my-4">
                                <button class="submit-btn">ADD STAFF</button>
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </div>
@endsection