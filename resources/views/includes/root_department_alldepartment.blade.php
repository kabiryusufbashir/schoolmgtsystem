<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">All Department</h1>
    @if(count($departments) > 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full"">
                        <thead class="border-b">
                            <tr class="text-left whitespace-nowrap">
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    NAME
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    HOD
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    LEVEL COORDINATOR
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    EXAM OFFICER
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $department->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ ($department->hod != null) ? $department->staffFullName($department->hod) : 'Empty' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ ($department->level_coordinator != null) ? $department->staffFullName($department->level_coordinator) : 'Empty' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ ($department->exam_officer != null) ? $department->staffFullName($department->exam_officer) : 'Empty' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span class="flex">
                                            <form action="{{ route('dept-edit', $department->id) }}" method="GET">
                                                @csrf 
                                                <input type="submit" value="EDIT" class="edit-btn">
                                            </form>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('dept-delete', $department->id) }}" method="POST">
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
                        {{$departments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Department Found</h1>
    @endif
</div>