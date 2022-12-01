<h1 class="text-lg font-semibold px-6">Result</h1>
<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <!-- Result -->
    <div id="checkCourseBtn" class="settings-menu-div">
        <span class="bg-gray-300 px-2 py-2 rounded-full">
            @include('icons.results')
        </span>
        &nbsp;&nbsp;
        <span>
            <h1>View Result</h1>
        </span>
    </div>
</div>

<div id="checkCourse" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Check Result</span>
                <span id="closeModalcheckCourse" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Check Course  -->
                <form action="{{ route('student-result-check') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label for="session" class="input-title">Session</label><br>
                        <select class="input-field" name="session">
                            <option value=""></option>
                            @foreach($session_term as $session)
                                <option value="{{ $session->session }}">{{ $session->session($session->session) }}</option>
                            @endforeach
                        </select>
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="session" class="input-title">Semester</label><br>
                        <select class="input-field" name="semester">
                            <option value=""></option>
                            @foreach($semester_result as $term)
                                <option value="{{ $term->semester }}">{{ $term->semester }}</option>
                            @endforeach
                        </select>
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">CHECK RESULT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Check Course 
    let checkCourseLink = document.querySelector('#checkCourseBtn')
    let checkCourse = document.querySelector('#checkCourse')
    let closeModalcheckCourse = document.querySelector('#closeModalcheckCourse')

    checkCourseLink.addEventListener('click', ()=>{
        if(checkCourse.classList.contains('hidden')){
            checkCourse.classList.remove('hidden');
        }else{
            checkCourse.classList.add('hidden');
        }
    })

    closeModalcheckCourse.addEventListener('click', ()=>{
        if(checkCourse.classList.contains('hidden')){
            checkCourse.classList.remove('hidden');
        }else{
            checkCourse.classList.add('hidden');
        }
    })
</script>