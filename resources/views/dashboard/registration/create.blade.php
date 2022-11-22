<div id="addRegistration" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Registration</span>
                <span id="closeModaladdRegistration" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Registration Create  -->
                <form action="{{ route('registration-create') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="title" class="input-title">Registration Title</label><br>
                        <input type="text" name="title" placeholder="Registration Title" class="input-field">
                        @error('title')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-4">
                        <label for="session" class="input-title">Registration Session</label><br>
                        <input type="text" name="session" placeholder="Registration Session" class="input-field">
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-4">
                        <label for="semester" class="input-title">Registration Semester</label><br>
                        <select name="semester" class="input-field">
                            <option value=""></option>
                            <option value="First Semester">First Semester</option>
                            <option value="Second Semester">Second Semester</option>
                        </select>
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-4">
                        <label for="active" class="input-title">Registration Status</label><br>
                        <select name="active" class="input-field">
                            <option value=""></option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                        @error('active')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">ADD REGISTRATION</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Department 
    let addRegistrationLink = document.querySelector('#addRegistrationLink')
    let addRegistration = document.querySelector('#addRegistration')
    let closeModaladdRegistration = document.querySelector('#closeModaladdRegistration')

    addRegistrationLink.addEventListener('click', ()=>{
        if(addRegistration.classList.contains('hidden')){
            addRegistration.classList.remove('hidden');
        }else{
            addRegistration.classList.add('hidden');
        }
    })

    closeModaladdRegistration.addEventListener('click', ()=>{
        if(addRegistration.classList.contains('hidden')){
            addRegistration.classList.remove('hidden');
        }else{
            addRegistration.classList.add('hidden');
        }
    })
</script>