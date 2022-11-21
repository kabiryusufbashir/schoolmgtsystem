<div class="bg-white py-3 px-6 ml-4 mr-8 rounded grid grid-cols-7 gap-2 items-center">
    <div class="flex py-2 items-center col-span-2">
        <span class="mr-4">
            <img class="w-12 rounded-full" src="{{ $student->photo != null ? $student->photo : asset('/images/logo.png') }}" alt="{{ Auth::user()->name }} Photo">
        </span>
        <span class="text-sm">
            <div class="font-semibold mb-1">{{ $student->fullName($student->user_id) }}</div>
            <div>
                <span class="font-semibold">Matric No:</span> 
                {{ $student->matric_no }}
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Student ID:</div>
            <div>
                {{ Auth::user()->user_id }}
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Department:</div>
            <div>
                {{ $student->department($student->department) }}
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Level:</div>
            <div>
                {{ $student->current_year }}00
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Combination:</div>
            <div>
                {{ $student->department($student->department) }}
            </div>
        </span>
    </div>
</div>