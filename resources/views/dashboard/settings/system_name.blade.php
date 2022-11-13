<div id="systemName" class="hidden">
    <div id="system-name-content" class="rounded">
        <div id="system-name-header" class="modal-header">
            <span>School Name</span>
            <span id="closeModalSystemName" class="cursor-pointer">X</span>
        </div>
        <div id="system-name-body" class="p-4">
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
                    <button class="submit-btn">Update Name</button>
                </div>
            </form>
        </div>
    </div> 
</div>