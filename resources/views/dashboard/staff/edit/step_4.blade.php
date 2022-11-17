<div class="mb-4">
    <a href="{{ route('staff-edit-step-1', $staff->user_id) }}">
        <span>Step 1: Personal Data /</span>
    </a>
    <a href="{{ route('staff-edit-step-2', $staff->user_id) }}">
        <span>Step 2: Contact Address /</span>
    </a>
    <a href="{{ route('staff-edit-step-3', $staff->user_id) }}">
        <span>Step 3: Educational Qualification /</span>
    </a>
    <a href="{{ route('staff-edit-step-4', $staff->user_id) }}">
        <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 4: Photo & Department</span>
    </a>
</div>
<div class="py-4 lg:w-1/3">
    <!-- Staff Add  -->
    <form action="{{ route('staff-update-step-4', $staff->user_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- Department  -->
        <div class="my-4">
            <label for="department" class="input-title">Department</label><br>
            <div>
                <select name="department" class="input-field">
                    <option value="{{ $staff->department }}">{{ $staff->department($staff->department) }}</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department')
                    {{$message}}
                @enderror
            </div>
        </div>
        <!-- Photo  -->
        <div class="my-4">
            <label for="name" class="text-lg font-medium border-b-4 border-green-700">Staff Photo</label><br>
            <div class="grid grid-cols-2 gap-2 items-center mt-3">
                <div class="mr-4">
                    <img class="w-64" src="{{ $staff->photo != null ? $staff->photo : asset('/images/logo.png') }}" alt="{{ $staff->first_name }} Photo">
                </div>
                <div>
                    <input type="file" name="photo">
                </div>
            </div>
            @error('photo')
                {{$message}}
            @enderror
        </div>
        <div class="text-center my-4">
            <button class="submit-btn">UPDATE STAFF</button>
        </div>
    </form>
</div>