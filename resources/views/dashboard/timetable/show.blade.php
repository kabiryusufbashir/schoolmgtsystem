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
                    <h1 class="text-lg font-semibold py-4 w-full">{{ $department }} Department Timetable</h1>
                    @if(count($timetables) > 0)
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-full"">
                                            <thead class="border-b">
                                                <tr class="text-left whitespace-nowrap border">
                                                    <th scope="col" class="px-6 py-2  text-gray-500 border">MONDAY</th>
                                                    @if(count($monday) > 0)
                                                        @foreach($monday as $day)
                                                            @include('includes.root_timetable_template')
                                                        @endforeach
                                                    @else
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                    @endif
                                                </tr>
                                                <tr class="text-left whitespace-nowrap border">
                                                    <th scope="col" class="px-6 py-2  text-gray-500 border">TUESDAY</th>
                                                    @if(count($tuesday) > 0)
                                                        @foreach($tuesday as $day)
                                                            @include('includes.root_timetable_template')
                                                        @endforeach
                                                    @else
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                    @endif
                                                </tr>
                                                <tr class="text-left whitespace-nowrap border">
                                                    <th scope="col" class="px-6 py-2  text-gray-500 border">WEDNESDAY</th>
                                                    @if(count($wednesday) > 0)
                                                        @foreach($wednesday as $day)
                                                            @include('includes.root_timetable_template')
                                                        @endforeach
                                                    @else
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                    @endif
                                                </tr>
                                                <tr class="text-left whitespace-nowrap border">
                                                    <th scope="col" class="px-6 py-2  text-gray-500 border">THURSADY</th>
                                                    @if(count($thursday) > 0)
                                                        @foreach($thursday as $day)
                                                            @include('includes.root_timetable_template')
                                                        @endforeach
                                                    @else
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                    @endif
                                                </tr>
                                                <tr class="text-left whitespace-nowrap border">
                                                    <th scope="col" class="px-6 py-2  text-gray-500 border">FRIDAY</th>
                                                    @if(count($friday) > 0)
                                                        @foreach($friday as $day)
                                                            @include('includes.root_timetable_template')
                                                        @endforeach
                                                    @else
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                    @endif
                                                </tr>
                                                <tr class="text-left whitespace-nowrap border">
                                                    <th scope="col" class="px-6 py-2  text-gray-500 border">SATURDAY</th>
                                                    @if(count($saturday) > 0)
                                                        @foreach($saturday as $day)
                                                            @include('includes.root_timetable_template')
                                                        @endforeach
                                                    @else
                                                        <td class="px-6 py-4 text-sm text-gray-500 border">Free</td>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h1 class="text-lg font-semibold py-4 w-full">No Timetable Found</h1>
                    @endif
                </div>
        </div>
    </div>
@endsection