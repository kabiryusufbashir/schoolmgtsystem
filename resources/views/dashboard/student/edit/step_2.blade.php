<div class="mb-4">
    <a href="{{ route('staff-edit-step-1', $staff->user_id) }}">
        <span>Step 1: Personal Data /</span>
    </a>
    <a href="{{ route('staff-edit-step-2', $staff->user_id) }}">
        <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 2: Contact Address /</span>
    </a>
    <a href="{{ route('staff-edit-step-3', $staff->user_id) }}">
        <span>Step 3: Educational Qualification /</span>
    </a>
    <a href="{{ route('staff-edit-step-4', $staff->user_id) }}">
        <span>Step 4: Photo & Department</span>
    </a>
</div>
<div class="py-4 lg:w-1/3">
    <!-- Staff Edit  -->
    <form action="{{ route('staff-update-step-2', $staff->user_id) }}" method="POST">
        @csrf
        @method('PATCH')
        <!-- Phone  -->
        <div class="my-4">
            <label for="phone" class="input-title">Phone</label><br>
            <input type="text" value="{{ $staff->phone }}" name="phone" placeholder="Phone" class="input-field">
            @error('phone')
                {{$message}}
            @enderror
        </div>
        <!-- Address  -->
        <div class="my-4">
            <label for="address" class="input-title">Address</label><br>
            <textarea name="address" placeholder="Address" class="input-field">{{ $staff->address }}</textarea>
            @error('address')
                {{$message}}
            @enderror
        </div>
        <!-- City  -->
        <div class="my-4">
            <label for="city" class="input-title">City</label><br>
            <input type="text"  value="{{ $staff->city }}" name="city" placeholder="City" class="input-field">
            @error('city')
                {{$message}}
            @enderror
        </div>
        <!-- State  -->
        <div class="my-4">
            <label for="state_of_origin" class="input-title">State</label><br>
            <input type="text" value="{{ $staff->state }}" name="state" placeholder="State" class="input-field">
            @error('state')
                {{$message}}
            @enderror
        </div>
        <!-- Country  -->
        <div class="my-4">
            <label for="country" class="input-title">Country</label><br>
            <input type="text" value="{{ $staff->country }}" name="country" placeholder="Country" class="input-field">
            @error('state')
                {{$message}}
            @enderror
        </div>
        <div>
            <a href="{{ route('staff-edit-step-1', $staff->user_id) }}">
                <div id="addField" class="bg-blue-800 text-white p-2 rounded float-left mb-3 text-xs cursor-pointer">Previous</div>
            </a>
            <a href="{{ route('staff-edit-step-3', $staff->user_id) }}">    
                <div id="addField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Next</div>
            </a>
        </div>
        <div class="text-center my-4">
            <button class="submit-btn">UPDATE STAFF</button>
        </div>
    </form>
</div>