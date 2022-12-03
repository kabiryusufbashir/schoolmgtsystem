<div id="addProgramme" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Programme</span>
                <span id="closeModaladdProgramme" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Programme Create  -->
                <form action="{{ route('programme-create') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="name" class="input-title">Programme Name</label><br>
                        <input type="text" name="name" placeholder="Programme Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">ADD PROGRAMME</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Department 
    let addProgrammeLink = document.querySelector('#addProgrammeLink')
    let addProgramme = document.querySelector('#addProgramme')
    let closeModaladdProgramme = document.querySelector('#closeModaladdProgramme')

    addProgrammeLink.addEventListener('click', ()=>{
        if(addProgramme.classList.contains('hidden')){
            addProgramme.classList.remove('hidden');
        }else{
            addProgramme.classList.add('hidden');
        }
    })

    closeModaladdProgramme.addEventListener('click', ()=>{
        if(addProgramme.classList.contains('hidden')){
            addProgramme.classList.remove('hidden');
        }else{
            addProgramme.classList.add('hidden');
        }
    })
</script>