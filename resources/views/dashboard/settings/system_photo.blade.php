<div id="systemPhoto" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>School Photo</span>
                <span id="closeModalSystemPhoto" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- System Photo  -->
                <form action="{{ route('settings-photo') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="text-lg font-medium border-b-4 border-green-700">School Photo</label><br>
                        <div class="grid grid-cols-2 gap-2 items-center mt-3">
                            <div class="mr-4">
                                <img class="w-64" src="{{ Auth::user()->photo != null ? Auth::user()->photo : asset('/images/user.png') }}" alt="{{ Auth::user()->name }} Photo">
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