<div class="mb-4">
    <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 1: Bio Data /</span>
    <span>Step 2: Contact Address /</span>
    <span>Step 3: Educational Qualification</span>
</div>
<div class="py-4 lg:w-1/3">
    <!-- Staff Add  -->
    <form action="{{ route('staff-update-step-1', $staff->user_id) }}" method="POST">
        @csrf
        @method('PATCH')
        <!-- title  -->
        <div class="my-4">
            <label for="title" class="input-title">Title</label><br>
            <select name="title" class="input-field">
                <option value="{{ $staff->title }}">{{ $staff->title }}</option>
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
        <!-- First Name  -->
        <div class="my-4">
            <label for="first_name" class="input-title">First Name</label><br>
            <input type="text" value="{{ $staff->first_name }}" name="first_name" placeholder="First Name" class="input-field">
            @error('first_name')
                {{$message}}
            @enderror
        </div>
        <!-- Last Name  -->
        <div class="my-4">
            <label for="last_name" class="input-title">Last Name</label><br>
            <input type="text" value="{{ $staff->last_name }}" name="last_name" placeholder="Last Name" class="input-field">
            @error('last_name')
                {{$message}}
            @enderror
        </div>
        <!-- Other Name  -->
        <div class="my-4">
            <label for="other_name" class="input-title">Other Name</label><br>
            <input type="text" value="{{ $staff->other_name }}" name="other_name" placeholder="Other Name" class="input-field">
            @error('other_name')
                {{$message}}
            @enderror
        </div>
        <!-- Email Address  -->
        <div class="my-4">
            <label for="email" class="input-title">Email Address</label><br>
            <input type="email" value="{{ $staff->email }}" name="email" placeholder="Email Address" class="input-field">
            @error('email')
                {{$message}}
            @enderror
        </div>
        <!-- Gender  -->
        <div class="my-4">
            <label for="gender" class="input-title">Gender</label><br>
            <select name="gender" class="input-field">
                <option value="{{ $staff->gender }}">{{ $staff->gender }}</option>
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
            <input type="date" value="{{ $staff->dob }}" name="dob" placeholder="Date of Birth" class="input-field">
            @error('dob')
                {{$message}}
            @enderror
        </div>
        <!-- Marital Status  -->
        <div class="my-4">
            <label for="marital_status" class="input-title">Marital Status</label><br>
            <select name="marital_status" class="input-field">
                <option  value="{{ $staff->marital_status }}">{{ $staff->marital_status }}</option>
                <option value="Male">Single</option>
                <option value="Female">Married</option>
                <option value="Female">Divorced</option>
            </select>
            @error('marital_status')
                {{$message}}
            @enderror
        </div>
        <div class="text-center my-4">
            <button class="submit-btn">EDIT STAFF</button>
        </div>
    </form>
</div>