<div id="systemPassword" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>School Password</span>
                <span id="closeModalSystemPassword" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- System Password -->
                <form action="{{ route('settings-password') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="password" class="font-medium">Old Password</label><br>
                        <input type="password" name="old_password" placeholder="Password" class="input-field">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="my-2">
                        <label for="new_password" class="font-medium">New Password</label><br>
                        <input type="password" name="new_password" placeholder="Password" class="input-field">
                        @error('new_password')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for="new_password_confirmation" class="font-medium">Confirm Password</label><br>
                        <input type="password" name="new_password_confirmation" placeholder="Password" class="input-field">
                        @error('new_password_confirmation')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="text-center my-4">
                        <button class="submit-btn">UPDATE PASSWORD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // System Password 
    let systemPasswordLink = document.querySelector('#systemPasswordLink')
    let systemPassword = document.querySelector('#systemPassword')
    let closeModalSystemPassword = document.querySelector('#closeModalSystemPassword')

    systemPasswordLink.addEventListener('click', ()=>{
        if(systemPassword.classList.contains('hidden')){
            systemPassword.classList.remove('hidden');
        }else{
            systemPassword.classList.add('hidden');
        }
    })

    closeModalSystemPassword.addEventListener('click', ()=>{
        if(systemPassword.classList.contains('hidden')){
            systemPassword.classList.remove('hidden');
        }else{
            systemPassword.classList.add('hidden');
        }
    })
</script>