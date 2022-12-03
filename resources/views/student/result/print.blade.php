<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Print Result</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/production.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        @vite('resources/css/app.css')
        <style type="text/css">
            @page { size: auto;  margin: 0mm; }
            @page {
            size: A2;
            margin: 0;
            }
            
            @media print {
            html, body {
                width: 210mm;
                height: 287mm;
                font-size: 100%;
            }

            html {

            }
            ::-webkit-scrollbar {
                width: 0px;  /* remove scrollbar space */
                background: transparent;  /* optional: just make scrollbar invisible */
            }
        </style>
    </head>
    <body>
        <div class="mt-2">
            <!-- Print Course  -->
            <div class="flex justify-between px-6 items-center">
                <div class="col-span-1">
                    <img style="width:80px; height:80px;" class="rounded-full" src="{{ $school->photo }}" alt="">
                </div>
                <div class="col-span-2">
                    <div class="font-semibold text-xl text-center">{{ $school->name }}</div>
                    <div class="font-semibold text-xl text-center">{{ $student_online->sessionYear($session_id) }} Student's Result</div>
                </div>
                <div class="col-span-1">
                    <img style="width:80px; height:80px;" class="rounded-full" src="{{ $student->photo }}" alt="">
                </div>
            </div>
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="w-full"">
                                    <thead class="border-b">
                                        <tr class="text-left whitespace-nowrap">
                                            <th scope="col" class="px-6 py-2  text-gray-500 border">
                                                NAME
                                            </th>
                                            <td scope="col" class="px-6 py-2  text-gray-500 border">
                                                {{ $student_online->studentFullName($student->user_id) }}
                                            </td>
                                            <th scope="col" class="px-6 py-2  text-gray-500 border">
                                                REG. NO
                                            </th>
                                            <td scope="col" class="px-6 py-2  text-gray-500 border">
                                                {{ $student->matric_no }}
                                            </td>
                                        </tr>
                                        <tr class="text-left whitespace-nowrap">
                                            <th scope="col" class="px-6 py-2  text-gray-500 border">
                                                DEPARTMENT
                                            </th>
                                            <td scope="col" class="px-6 py-2  text-gray-500 border">
                                                {{ $student_online->department($student->department) }}
                                            </td>
                                            <th scope="col" class="px-6 py-2  text-gray-500 border">
                                                SESSION
                                            </th>
                                            <td scope="col" class="px-6 py-2  text-gray-500 border">
                                                {{ $student_online->sessionYear($session_id) }}
                                            </td>
                                        </tr>
                                        <tr class="text-left whitespace-nowrap">
                                            <th scope="col" class="px-6 py-2  text-gray-500 border">
                                                PROGRAMME
                                            </th>
                                            <td scope="col" class="px-6 py-2  text-gray-500 border">
                                                {{ $student_online->programme($student_online->programme) }}
                                            </td>
                                            <th scope="col" class="px-6 py-2  text-gray-500 border">
                                                DATE
                                            </th>
                                            <td scope="col" class="px-6 py-2  text-gray-500 border">
                                                {{ date('h:ia', time() + 3600) }} {{ date('d M Y') }}
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5">
                <!-- Semester  -->
                @if(count($results) > 0)
                    <div class="my-3">
                        <h2 class="font-semibold">{{ $semester }}</h2>
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="w-full"">
                                                <thead class="border-b">
                                                    <tr class="text-left whitespace-nowrap">
                                                    <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            TITLE
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            UNIT
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            CA
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            EXAMS
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            PERCENTAGE SCORE
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            GRADE
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            GRADE POINT
                                                        </th>
                                                        <th scope="col" class="px-6 py-2 text-gray-500 border">
                                                            CUMULATIVE WEIGHT
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($results as $course)
                                                        <tr class="divide-y divide-gray-300 border-b-2">
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->courseName($course->course) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->courseUnit($course->course) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->ca }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->exams }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->resultPercentageScore($course->id) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->resultGrade($course->id) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->resultGradePoint($course->id) }}
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                {{ $course->cumulativeWeight($course->id) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach     
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <h2 class="font-semibold p-2 border">GPA = Total Weight Points / Total Credit Units</h2>
                        <h2 class="font-semibold p-2 border">GPA = {{ $student_online->cumulativeWeight($student_online->user_id, $session_id, $semester) }} / {{ $student_online->creditUnit($student_online->user_id, $session_id, $semester) }}</h2>
                        <h2 class="font-semibold p-2 border">GPA = {{ round($student_online->cumulativeWeight($student_online->user_id, $session_id, $semester) / $student_online->creditUnit($student_online->user_id, $session_id, $semester), 2) }}</h2>
                    </div>
                @else
                    <h1 class="text-lg font-semibold py-4 w-full">No Result Found</h1>
                @endif
            </div>
        </div>
        <div class="w-full text-center fixed bottom-0 text-sm">
            A Product Bitcags IT
        </div>
        <script type="text/javascript">
            window.print()
            setTimeout(function () {
                window.close();
                window.location = '../../../student/dashboard';
            }, 500);
        </script>
    </body>
</html>