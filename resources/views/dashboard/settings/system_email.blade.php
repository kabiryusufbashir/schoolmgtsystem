<div id="systemEmail" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>School Email</span>
                <span id="closeModalSystemEmail" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- System Name  -->
                <form action="{{ route('settings-email') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="name" class="text-lg font-medium">School Email</label><br>
                        <input type="text" name="email" value="{{ Auth::user()->email }}" placeholder="School Email" class="input-field">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">UPDATE EMAIL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>