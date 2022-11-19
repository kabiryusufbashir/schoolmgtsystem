<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">All Timetables</h1>
    @if(count($timetables) > 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full"">
                        <thead class="border-b">
                            <tr class="text-left whitespace-nowrap">
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    SESSION
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    DEPARTMENT
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    POSTED BY
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($timetables as $timetable)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $timetable->session($timetable->session) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 hover:text-green-600 hover:underline">
                                        <a href="{{ route('timetable-show', $timetable->department) }}">{{ $timetable->department($timetable->department) }}</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $timetable->postedBy($timetable->posted_by) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span class="flex">
                                            <form action="{{ route('timetable-show', $timetable->department) }}" method="GET">
                                                @csrf 
                                                <input type="submit" value="VIEW TIMETABLE" class="edit-btn">
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center mt-4">
                        {{$timetables->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Timetable Found</h1>
    @endif
</div>