<div class="mb-4">
    <a href="{{ route('staff-edit-step-1', $staff->user_id) }}">
        <span>Step 1: Personal Data /</span>
    </a>
    <a href="{{ route('staff-edit-step-2', $staff->user_id) }}">
        <span>Step 2: Contact Address /</span>
    </a>
    <a href="{{ route('staff-edit-step-3', $staff->user_id) }}">
        <span class="p-2 bg-gray-200 rounded cursor-pointer">Step 3: Educational Qualification /</span>
    </a>
    <a href="{{ route('staff-edit-step-4', $staff->user_id) }}">
        <span>Step 4: Photo & Department</span>
    </a>
</div>
<div class="py-4 lg:w-1/3">
    <!-- Staff Add  -->
    <form action="{{ route('staff-update-step-3', $staff->user_id) }}" method="POST">
        @csrf
        @method('PATCH')
        <!-- Qualifications  -->
        @if(count($qualification) > 0)
            @foreach($qualification as $certificate)
                <div class="border-b-2 my-2">
                    <label for="school Attended" class="input-title">School Attended</label><br>
                    <div>
                        <input type="text" value="{{ $certificate->school_name }}" name="school_name[]" placeholder="School Name" class="input-field mb-2">
                        <input type="text" value="{{ $certificate->year_graduated }}" name="year_graduated[]" placeholder="Year of Graduation" class="input-field mb-2">
                        <input type="text" value="{{ $certificate->qualification_name }}" name="qualification_name[]" placeholder="Qualification Attained" class="input-field mb-2">
                        @error('school')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            @endforeach
        @else
            <div class="border-b-2 my-2">
                <label for="school Attended" class="input-title">School Attended</label><br>
                <div>
                    <input type="text" name="school_name[]" placeholder="School Name" class="input-field mb-2">
                    <input type="text" name="year_graduated[]" placeholder="Year of Graduation" class="input-field mb-2">
                    <input type="text" name="qualification_name[]" placeholder="Qualification Attained" class="input-field mb-2">
                    @error('school')
                        {{$message}}
                    @enderror
                </div>
            </div>
        @endif
        <div id="qualificationSection" class="my-4"></div>
        
        <div id="addField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Add Field + </div>
        <br><br>
        <div>
            <a href="{{ route('staff-edit-step-2', $staff->user_id) }}">
                <div id="addField" class="bg-blue-800 text-white p-2 rounded float-left mb-3 text-xs cursor-pointer">Previous</div>
            </a>
            <a href="{{ route('staff-edit-step-4', $staff->user_id) }}">    
                <div id="addField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Next</div>
            </a>    
        </div>
        <div class="text-center my-4">
            <button class="submit-btn">UPDATE STAFF</button>
        </div>
    </form>
</div>

<script>
    let addField = document.querySelector('#addField')
    let qualificationSection = document.querySelector('#qualificationSection')
    const divContent = 
            '<div class="border-b-2 my-2">'+
                '<label for="school Attended" class="input-title">School Attended</label><br>'+
                '<div>'+
                    '<input type="text" name="school_name[]" placeholder="School Name" class="input-field mb-2">'+
                    '<input type="text" name="year_graduated[]" placeholder="Year of Graduation" class="input-field mb-2">'+
                    '<input type="text" name="qualification_name[]" placeholder="Qualification Attained" class="input-field mb-2">'+    
                '</div>'+
            '</div>'

    addField.addEventListener('click', ()=>{
        qualificationSection.insertAdjacentHTML('beforeend', divContent)
    })

</script>