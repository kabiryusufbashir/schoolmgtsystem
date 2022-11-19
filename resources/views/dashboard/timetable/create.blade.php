<div id="addTimetable" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Timetable</span>
                <span id="closeModaladdTimetable" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- timetable Create  -->
                <form action="{{ route('timetable-create') }}" method="POST" class="px-6 lg:px-8 py-8">
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
                        <label for="course" class="input-title">Course</label><br>
                        <select name="course" class="input-field">
                            <option value=""></option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_code }} - {{ $course->name }}</option>
                            @endforeach
                        </select>
                        @error('course')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="venue" class="input-title">Venue</label><br>
                        <input type="text" name="venue" placeholder="Venue" class="input-field">
                        @error('venue')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="day" class="input-title">Day</label><br>
                        <select name="day" class="input-field">
                            <option value=""></option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        @error('day')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="start_date" class="input-title">Start Time</label><br>
                        <input type="time" name="start_date" placeholder="Start Time" class="input-field">
                        @error('start_date')
                            {{$message}}
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="input-title">End Time</label><br>
                        <input type="time" name="end_date" placeholder="End Time" class="input-field">
                        @error('end_date')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">ADD TIMETABLE</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create timetable 
    let addTimetableLink = document.querySelector('#addTimetableLink')
    let addTimetable = document.querySelector('#addTimetable')
    let closeModaladdTimetable = document.querySelector('#closeModaladdTimetable')

    addTimetableLink.addEventListener('click', ()=>{
        if(addTimetable.classList.contains('hidden')){
            addTimetable.classList.remove('hidden');
        }else{
            addTimetable.classList.add('hidden');
        }
    })

    closeModaladdTimetable.addEventListener('click', ()=>{
        if(addTimetable.classList.contains('hidden')){
            addTimetable.classList.remove('hidden');
        }else{
            addTimetable.classList.add('hidden');
        }
    })
</script>