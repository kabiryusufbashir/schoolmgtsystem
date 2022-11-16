<div id="addDepartment" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Department</span>
                <span id="closeModalAddDepartment" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Department Create  -->
                <form action="{{ route('dept-create') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="name" class="input-title">Department Name</label><br>
                        <input type="text" name="name" placeholder="Department Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">ADD DEPARTMENT</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Department 
    let addDepartmentLink = document.querySelector('#addDepartmentLink')
    let addDepartment = document.querySelector('#addDepartment')
    let closeModalAddDepartment = document.querySelector('#closeModalAddDepartment')

    addDepartmentLink.addEventListener('click', ()=>{
        if(addDepartment.classList.contains('hidden')){
            addDepartment.classList.remove('hidden');
        }else{
            addDepartment.classList.add('hidden');
        }
    })

    closeModalAddDepartment.addEventListener('click', ()=>{
        if(addDepartment.classList.contains('hidden')){
            addDepartment.classList.remove('hidden');
        }else{
            addDepartment.classList.add('hidden');
        }
    })
</script>