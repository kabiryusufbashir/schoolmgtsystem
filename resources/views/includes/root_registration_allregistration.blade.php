<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">All registration</h1>
    @if(count($registrations) > 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full"">
                        <thead class="border-b">
                            <tr class="text-left whitespace-nowrap">
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    TITLE
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    SESSION
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    SEMESTER
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    ACTIVE
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $registration->title }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $registration->session }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $registration->semester }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        @if($registration->active == 1)
                                            Active
                                        @else
                                            Not Active
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span class="flex">
                                            <form action="{{ route('registration-edit', $registration->id) }}" method="GET">
                                                @csrf 
                                                <input type="submit" value="EDIT" class="edit-btn">
                                            </form>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('registration-delete', $registration->id) }}" method="POST">
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
                    <div class="row d-flex justify-content-center mt-4">
                        {{ $registrations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Registration Found</h1>
    @endif
</div>