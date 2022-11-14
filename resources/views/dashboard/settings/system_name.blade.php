<div id="systemName" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>School Name</span>
                <span id="closeModalSystemName" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- System Name  -->
                <form action="{{ route('settings-name') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="name" class="text-lg font-medium">School Name</label><br>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="School Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">UPDATE NAME</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // System Name 
    let systemNameLink = document.querySelector('#systemNameLink')
    let systemName = document.querySelector('#systemName')
    let closeModalSystemName = document.querySelector('#closeModalSystemName')

    systemNameLink.addEventListener('click', ()=>{
        if(systemName.classList.contains('hidden')){
            systemName.classList.remove('hidden');
        }else{
            systemName.classList.add('hidden');
        }
    })

    closeModalSystemName.addEventListener('click', ()=>{
        if(systemName.classList.contains('hidden')){
            systemName.classList.remove('hidden');
        }else{
            systemName.classList.add('hidden');
        }
    })
</script>