<div id="systemPhoto" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Student Photo</span>
                <span id="closeModalSystemPhoto" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- System Photo  -->
                <form action="{{ route('student-settings-photo') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="text-lg font-medium border-b-4 border-green-700">Student Photo</label><br>
                        <div class="grid grid-cols-2 gap-2 items-center mt-3">
                            <div class="mr-4">
                                <img class="w-64" src="{{ $student_profile->photo != null ? $student_profile->photo : asset('/images/user.png') }}" alt="{{ Auth::user()->name }} Photo">
                            </div>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        @error('photo')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">UPDATE PHOTO</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // System photo 
    let systemPhotoLink = document.querySelector('#systemPhotoLink')
    let systemPhoto = document.querySelector('#systemPhoto')
    let closeModalSystemPhoto = document.querySelector('#closeModalSystemPhoto')

    systemPhotoLink.addEventListener('click', ()=>{
        if(systemPhoto.classList.contains('hidden')){
            systemPhoto.classList.remove('hidden');
        }else{
            systemPhoto.classList.add('hidden');
        }
    })

    closeModalSystemPhoto.addEventListener('click', ()=>{
        if(systemPhoto.classList.contains('hidden')){
            systemPhoto.classList.remove('hidden');
        }else{
            systemPhoto.classList.add('hidden');
        }
    })
</script>