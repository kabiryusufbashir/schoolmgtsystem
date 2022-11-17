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
            <!-- Bulk Upload  -->
            <div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>
                <!-- Add Staff  -->
                <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 mb-5 rounded">
                    <h1 class="text-lg font-semibold py-4 w-full">Staff Bulk Upload</h1>
                    <div class="py-4 lg:w-1/3">
                        <!-- Staff Add  -->
                        <form action="{{ route('staff-bulk-upload-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Last Name  -->
                            <div class="my-4">
                                <label for="last_name" class="input-title">Choose CSV file</label><br>
                                <input type="file" name="bulk_upload" class="input-field">
                                @error('bulk_upload')
                                    {{$message}}
                                @enderror
                            </div>
                            <div>
                                <a class="hover:text-green-500 hover:underline text-sm" href="{{ asset('uploads/samples/staff_sample_template.csv') }}">Click to Download a sample</a>
                            </div>
                            <div class="text-center my-4">
                                <button class="submit-btn">UPLOAD STAFF</button>
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </div>
@endsection