<div class="bg-white py-3 px-6 ml-4 mr-8 rounded grid grid-cols-7 gap-2 items-center">
    <div class="flex py-2 items-center col-span-2">
        <span class="mr-4">
            <img class="w-12 h-12 object-cover rounded-full" src="{{ $student_profile->photo != null ? $student_profile->photo : asset('/images/logo.png') }}" alt="{{ Auth::user()->name }} Photo">
        </span>
        <span class="text-sm">
            <div class="font-semibold mb-1">{{ $student_profile->fullName($student_profile->user_id) }}</div>
            <div>
                <span class="font-semibold">Matric No:</span> 
                {{ $student_profile->matric_no }}
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Student ID:</div>
            <div>
                {{ $student_profile->username }}
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Department:</div>
            <div>
                {{ $student_profile->department($student_profile->department) }}
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Level:</div>
            <div>
                {{ $student_profile->current_year }}00 {{ $semester }} 
            </div>
        </span>
    </div>
    <div class="col-span-1">
        <span class="text-sm">
            <div class="font-semibold mb-1">Combination:</div>
            <div>
                {{ $student_profile->programme($student_profile->programme) }}
            </div>
        </span>
    </div>
</div>
<div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>