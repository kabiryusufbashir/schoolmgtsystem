<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">All Courses</h1>
    @if(count($courses) > 0)
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
                                    CODE
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    TYPE
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    UNIT
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    DEPARTMENT
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    LECTURER
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $course->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $course->course_code }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $course->course_type }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $course->course_unit }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ ($course->department != null) ? $course->department($course->department) : 'Empty' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ ($course->lecturer != null) ? $course->lecturerName($course->lecturer) : 'Empty' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span class="flex">
                                            <form action="{{ route('course-edit', $course->id) }}" method="GET">
                                                @csrf 
                                                <input type="submit" value="EDIT" class="edit-btn">
                                            </form>
                                            &nbsp;&nbsp;
                                            <form action="{{ route('course-delete', $course->id) }}" method="POST">
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
                        {{$courses->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Course Found</h1>
    @endif
</div>