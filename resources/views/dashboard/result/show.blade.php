@extends('layouts.app')

@section('page-title')
    Result - AKCILS
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
                    <h1 class="text-lg font-semibold py-4 w-full">{{ $course_name }} {{ $semester }}'s {{ $session_year }} result</h1>
                    @if(count($results) > 0)
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-full"">
                                            <thead class="border-b">
                                                <tr class="text-left whitespace-nowrap">
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        MATRIC NO
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        CA
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                        EXAMS
                                                    </th>
                                                    <th scope="col" class="px-6 py-2  text-gray-500">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($results as $result)
                                                    <tr class="divide-y divide-gray-300 border-b-2">
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $result->studentMatricNo($result->student_id) }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $result->ca }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ $result->exams }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            <span class="flex">
                                                                <form action="{{ route('result-edit', $result->id) }}" method="GET">
                                                                    @csrf 
                                                                    <input type="submit" value="EDIT" class="edit-btn">
                                                                </form>
                                                                &nbsp;&nbsp;
                                                                <form action="{{ route('result-delete', $result->id) }}" method="POST">
                                                                    @csrf 
                                                                    @method('DELETE')
                                                                    <input type="submit" value="DELETE" class="del-btn">
                                                                </form>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h1 class="text-lg font-semibold py-4 w-full">No Result Found</h1>
                    @endif
                </div>
        </div>
    </div>
@endsection