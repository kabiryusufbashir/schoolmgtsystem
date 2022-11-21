<div class="flex overflow-x-scroll hide-scroll-bar ml-4 mr-8 mb-4">
    <div class="flex flex-nowrap">
        <!-- Students  -->
        <div class="inline w-96 max-w-xs bg-white py-7 px-6 mr-4 text-gray-600 my-5 rounded">
            <a href="{{ route('root-student') }}">
                <div class="flex py-2 items-center">
                    <span class="mr-4">
                        <div class="bg-blue-200 p-2 rounded-full text-white">
                            @include('icons.student')
                        </div>
                    </span>
                    <span class="text-sm">
                        <div class="font-semibold mb-1">Student</div>
                        <div>
                            View overview of your <br>Student here
                        </div>
                    </span>
                </div>
            </a>
        </div>
        <!-- Students  -->
        <div class="inline w-96 max-w-xs bg-white py-7 px-6 mr-4 text-gray-600 my-5 rounded">
            <a href="{{ route('root-student') }}">
                <div class="flex py-2 items-center">
                    <span class="mr-4">
                        <div class="bg-blue-200 p-2 rounded-full text-white">
                            @include('icons.student')
                        </div>
                    </span>
                    <span class="text-sm">
                        <div class="font-semibold mb-1">Student</div>
                        <div>
                            View overview of your <br>Student here
                        </div>
                    </span>
                </div>
            </a>
        </div>
        <!-- Courses  -->
        <div class="inline w-96 max-w-xs bg-white py-7 px-6 mr-4 text-gray-600 my-5 rounded">
            <a href="{{ route('root-course') }}">
                <div class="flex py-2 items-center">
                    <span class="mr-4">
                        <div class="bg-green-200 p-2 rounded-full text-white">
                            @include('icons.course')
                        </div>
                    </span>
                    <span class="text-sm">
                        <div class="font-semibold mb-1">Courses</div>
                        <div>
                            View overview of your <br>Courses here
                        </div>
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>