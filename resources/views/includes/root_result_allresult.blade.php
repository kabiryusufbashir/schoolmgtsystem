<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">All Results</h1>
    @if(count($results) > 0)
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
                                    COURSE
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    SEMESTER
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    POSTED BY
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $result->session($result->session) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $result->course($result->course) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $result->semester }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $result->postedBy($result->posted_by) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span class="flex">
                                            <form action="{{ route('result-show', $result->semester) }}" method="GET">
                                                @csrf 
                                                <input style="display:none;" value="{{ $result->session }}" name="session" class="input-field">
                                                <input style="display:none;" value="{{ $result->semester }}" name="semester" class="input-field">
                                                <input style="display:none;" value="{{ $result->course }}" name="course" class="input-field">
                                                <input type="submit" value="VIEW RESULT" class="edit-btn">
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center mt-4">
                        {{$results->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Result Found</h1>
    @endif
</div>