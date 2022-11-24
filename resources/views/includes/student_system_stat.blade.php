<div class="grid grid-cols-3 gap-3 ml-4 mr-8 mb-4">
    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
        <div>
            <div class="font-medium mb-1 text-lg">Session: {{ $session }}</div>
            <div class="font-semibold mb-1 text-2xl flex items-center">
            <div class="font-medium mb-1 text-sm">Payment Status: &nbsp;</div>
                <div class="font-medium mb-1 text-sm">
                    @if($semester == 'First Semester')
                        {{ $student_online->paymentSessionStatus() }}
                    @else
                        Paid
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
        <div>
            <div class="font-medium mb-1 text-lg">Semester: {{ $semester }}</div>
            <div class="font-semibold mb-1 text-2xl flex items-center">
                <div class="font-medium mb-1 text-sm">Payment Status: &nbsp;</div>
                <div class="font-medium mb-1 text-sm">
                    {{ $student_online->paymentSemesterStatus() }}
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
        <div>
            <div class="font-medium mb-1 text-lg">Current CGPA:</div>
            <div class="font-semibold mb-1 text-2xl">0.0</div>
        </div>
    </div>
</div>