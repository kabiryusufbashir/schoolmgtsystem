<div id="addResult" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Result</span>
                <span id="closeModaladdResult" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Result Create  -->
                <form action="{{ route('result-create') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="session" class="input-title">Session</label><br>
                        <select name="session" class="input-field">
                            <option value=""></option>
                            @foreach($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->session }}</option>
                            @endforeach
                        </select>
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="semester" class="input-title">Semester</label><br>
                        <select name="semester" class="input-field">
                            <option value=""></option>
                            <option value="First Semester">First Semester</option>
                            <option value="Second Semester">Second Semester</option>
                        </select>
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="course" class="input-title">Course</label><br>
                        <select name="course_id" class="input-field">
                            <option value=""></option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->courseName($course->id) }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">INSERT</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Result 
    let addResultLink = document.querySelector('#addResultLink')
    let addResult = document.querySelector('#addResult')
    let closeModaladdResult = document.querySelector('#closeModaladdResult')

    addResultLink.addEventListener('click', ()=>{
        if(addResult.classList.contains('hidden')){
            addResult.classList.remove('hidden');
        }else{
            addResult.classList.add('hidden');
        }
    })

    closeModaladdResult.addEventListener('click', ()=>{
        if(addResult.classList.contains('hidden')){
            addResult.classList.remove('hidden');
        }else{
            addResult.classList.add('hidden');
        }
    })
</script>