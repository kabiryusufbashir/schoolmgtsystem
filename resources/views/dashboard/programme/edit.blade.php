@extends('layouts.app')

@section('page-title')
    Programme - AKCILS
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
            <!-- Edit Department  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">Edit {{ $programme->name }} Department</h1>
                <div class="p-4">
                <!-- Department Edit  -->
                <form action="{{ route('programme-update', $programme->id) }}" method="POST" class="lg:w-1/2 lg:mx-auto px-6 lg:px-8 py-8 shadow">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name" class="input-title">Programme Name</label><br>
                        <input type="text" value="{{ $programme->name }}" name="name" placeholder="Programme Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">EDIT PROGRAMME</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection