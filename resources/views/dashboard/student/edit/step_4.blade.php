<div class="mb-4">
    <a href="{{ route('student-edit-step-1', $student->user_id) }}">
        <span>Step 1: Personal Data /</span>
    </a>
    <a href="{{ route('student-edit-step-2', $student->user_id) }}">
        <span>Step 2: Contact Address /</span>
    </a>
    <a href="{{ route('student-edit-step-3', $student->user_id) }}">
        <span>Step 3: Educational History /</span>
    </a>
    <a href="{{ route('student-edit-step-4', $student->user_id) }}">
        <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 4: Photo & Department</span>
    </a>
</div>
<div class="py-4 lg:w-1/3">
    <!-- Student Add  -->
    <form action="{{ route('student-update-step-4', $student->user_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- Department  -->
        <div class="my-4">
            <label for="department" class="input-title">Department</label><br>
            <div>
                <select name="department" class="input-field">
                    <option value="{{ $student->department }}">{{ $student->department($student->department) }}</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- Programme  -->
        <div class="my-4">
            <label for="programme" class="input-title">Programme</label><br>
            <div>
                <select name="programme" class="input-field">
                    <option value="{{ $student->programme }}">{{ $student->programme($student->programme) }}</option>
                    @foreach($programmes as $programme)
                        <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                    @endforeach
                </select>
                @error('programme')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- Photo  -->
        <div class="my-4">
            <label for="name" class="text-lg font-medium border-b-4 border-green-700">Student Photo</label><br>
            <div class="grid grid-cols-2 gap-2 items-center mt-3">
                <div class="mr-4">
                    <img class="w-64" src="{{ $student->photo != null ? $student->photo : asset('/images/logo.png') }}" alt="{{ $student->first_name }} Photo">
                </div>
                <div>
                    <input type="file" name="photo">
                </div>
            </div>
            @error('photo')
                {{$message}}
            @enderror
        </div>
        <div>
            <a href="{{ route('student-edit-step-3', $student->user_id) }}">
                <div id="addField" class="bg-blue-800 text-white p-2 rounded float-left mb-3 text-xs cursor-pointer">Previous</div>
            </a>    
        </div>
        <div class="text-center my-4">
            <button class="submit-btn">UPDATE STUDENT</button>
        </div>
    </form>
</div>