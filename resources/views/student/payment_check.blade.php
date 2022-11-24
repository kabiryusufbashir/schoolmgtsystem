<div style="background-color: rgba(0, 0, 0, 0.8); position: fixed; z-index: 300; left: 0; top: 0; padding-top:5%; width: 100%; height: 100%; overflow: auto;">
	<div class="bg-white w-1/2 mx-auto py-4">		
        @if(Auth::guard('students')->user()->checkSessionPayment() == 'First Semester-0')
            <div class="text-center">
                <h3>Upload Receipt</h3>
            </div>
            <form action="{{ route('submit-payment') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                @csrf
                    <div class="flex">
                        <label for="session" class="text-lg font-medium border-b-4 border-green-700 ml-4">Session Receipt</label><br>
                        <input class="input-field" type="file" name="session">
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="flex my-5">
                        <label for="semester" class="text-lg font-medium border-b-4 border-green-700 ml-4">Semester Receipt</label><br>
                        <input class="input-field" type="file" name="semester">
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">SUBMIT</button>
                    </div>
            </form>
        @elseif(Auth::guard('students')->user()->checkSessionPayment() == 'Second Semester-0')
            <div class="text-center">
                <h3>Upload Receipt</h3>
            </div>
            <form action="{{ route('submit-payment') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                @csrf
                    <div class="flex my-5">
                        <label for="semester" class="text-lg font-medium border-b-4 border-green-700 ml-4">Semester Receipt</label><br>
                        <input class="input-field" type="file" name="semester">
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">SUBMIT</button>
                    </div>
            </form>
        @endif
	</div>
</div>