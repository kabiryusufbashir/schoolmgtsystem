<div id="addExam" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Exam</span>
                <span id="closeModaladdExam" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Exam Create  -->
                <form action="{{ route('exam-create') }}" method="POST" class="px-6 lg:px-8 py-8">
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
                        <label for="exam_type" class="input-title">Type</label><br>
                        <select name="exam_type" class="input-field">
                            <option value=""></option>
                            <option value="CA">Continuous Assessment</option>
                            <option value="End of Semester">End of Semester</option>
                        </select>
                        @error('exam_type')
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
                        <label for="start_date" class="input-title">Start Date</label><br>
                        <input type="date" name="start_date" placeholder="Start Date" class="input-field">
                        @error('start_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="input-title">End Date</label><br>
                        <input type="date" name="end_date" placeholder="End Date" class="input-field">
                        @error('end_date')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">ADD EXAM</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Exam 
    let addExamLink = document.querySelector('#addExamLink')
    let addExam = document.querySelector('#addExam')
    let closeModaladdExam = document.querySelector('#closeModaladdExam')

    addExamLink.addEventListener('click', ()=>{
        if(addExam.classList.contains('hidden')){
            addExam.classList.remove('hidden');
        }else{
            addExam.classList.add('hidden');
        }
    })

    closeModaladdExam.addEventListener('click', ()=>{
        if(addExam.classList.contains('hidden')){
            addExam.classList.remove('hidden');
        }else{
            addExam.classList.add('hidden');
        }
    })
</script>