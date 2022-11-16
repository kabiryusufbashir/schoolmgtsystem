<div class="mb-4">
    <span>Step 1: Bio Data /</span>
    <a href="{{ route('create-staff-step-2') }}">
        <span>Step 2: Contact Address /</span>
    </a>
    <a href="{{ route('create-staff-step-3') }}">
        <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 3: Educational Qualification</span>
    </a>
</div>
<div class="py-4 lg:w-1/3">
    <!-- Staff Add  -->
    <form action="{{ route('staff-update-step-3', $staff->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <!-- Qualifications  -->
        <div class="my-4">
            <label for="school Attended" class="input-title">School Attended</label><br>
            <input type="text" name="school_name[]" placeholder="School Name" class="input-field mb-2">
            <input type="text" name="year_graduated[]" placeholder="Year of Graduation" class="input-field mb-2">
            <input type="text" name="qualification_name[]" placeholder="Qualification Attained" class="input-field mb-2">
            <button class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs">Add Field + </button>
            @error('school')
                {{$message}}
            @enderror
        </div>
        <div class="text-center my-4">
            <button class="submit-btn">EDIT STAFF</button>
        </div>
    </form>
</div>