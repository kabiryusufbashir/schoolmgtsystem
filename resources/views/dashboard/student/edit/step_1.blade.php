<div class="mb-4">
    <a href="{{ route('student-edit-step-1', $student->user_id) }}">
        <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 1: Personal Data /</span>
    </a>
    <a href="{{ route('student-edit-step-2', $student->user_id) }}">
        <span>Step 2: Contact Address /</span>
    </a>
    <a href="{{ route('student-edit-step-3', $student->user_id) }}">
        <span>Step 3: Educational History /</span>
    </a>
    <a href="{{ route('student-edit-step-4', $student->user_id) }}">
        <span>Step 4: Photo & Department</span>
    </a>
</div>
<div class="py-4 lg:w-1/3">
    <!-- Student Add  -->
    <form action="{{ route('student-update-step-1', $student->user_id) }}" method="POST">
        @csrf
        @method('PATCH')
        <!-- title  -->
        <div class="my-4">
            <label for="title" class="input-title">Title</label><br>
            <select name="title" class="input-field">
                <option value="{{ $student->title }}">{{ $student->title }}</option>
                <option value="Mal">Mal</option>
                <option value="Malama">Malama</option>
                <option value="Alhaji">Alhaji</option>
                <option value="Hajiya">Hajiya</option>
                <option value="Dr">Dr</option>
                <option value="Prof">Prof</option>
            </select>
            @error('title')
                {{$message}}
            @enderror
        </div>
        <!-- Matric No  -->
        <div class="my-4">
            <label for="matric_no" class="input-title">Matric No</label><br>
            <input type="text" value="{{ $student->matric_no }}" name="matric_no" placeholder="Matric No" class="input-field">
            @error('matric_no')
                {{$message}}
            @enderror
        </div>
        <!-- First Name  -->
        <div class="my-4">
            <label for="first_name" class="input-title">First Name</label><br>
            <input type="text" value="{{ $student->first_name }}" name="first_name" placeholder="First Name" class="input-field">
            @error('first_name')
                {{$message}}
            @enderror
        </div>
        <!-- Last Name  -->
        <div class="my-4">
            <label for="last_name" class="input-title">Last Name</label><br>
            <input type="text" value="{{ $student->last_name }}" name="last_name" placeholder="Last Name" class="input-field">
            @error('last_name')
                {{$message}}
            @enderror
        </div>
        <!-- Other Name  -->
        <div class="my-4">
            <label for="other_name" class="input-title">Other Name</label><br>
            <input type="text" value="{{ $student->other_name }}" name="other_name" placeholder="Other Name" class="input-field">
            @error('other_name')
                {{$message}}
            @enderror
        </div>
        <!-- Email Address  -->
        <div class="my-4">
            <label for="email" class="input-title">Email Address</label><br>
            <input type="email" value="{{ $student->email }}" name="email" placeholder="Email Address" class="input-field">
            @error('email')
                {{$message}}
            @enderror
        </div>
        <!-- Gender  -->
        <div class="my-4">
            <label for="gender" class="input-title">Gender</label><br>
            <select name="gender" class="input-field">
                <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('gender')
                {{$message}}
            @enderror
        </div>
        <!-- DOB  -->
        <div class="my-4">
            <label for="dob" class="input-title">Date of Birth</label><br>
            <input type="date" value="{{ $student->dob }}" name="dob" placeholder="Date of Birth" class="input-field">
            @error('dob')
                {{$message}}
            @enderror
        </div>
        <!-- Marital Status  -->
        <div class="my-4">
            <label for="marital_status" class="input-title">Marital Status</label><br>
            <select name="marital_status" class="input-field">
                <option  value="{{ $student->marital_status }}">{{ $student->marital_status }}</option>
                <option value="Male">Single</option>
                <option value="Female">Married</option>
                <option value="Female">Divorced</option>
            </select>
            @error('marital_status')
                {{$message}}
            @enderror
        </div>
        <div>
            <a href="{{ route('student-edit-step-2', $student->user_id) }}">
                <div id="addField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Next</div>
            </a>    
        </div>
        <div class="text-center my-4">
            <button class="submit-btn">UPDATE STUDENT</button>
        </div>
    </form>
</div>