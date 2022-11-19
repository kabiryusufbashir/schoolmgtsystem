<div id="addCalendar" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Calendar</span>
                <span id="closeModaladdCalendar" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Calendar Create  -->
                <form action="{{ route('calendar-create') }}" method="POST" class="px-6 lg:px-8 py-8">
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
                        <label for="activity" class="input-title">Activity</label><br>
                        <input type="text" name="activity" placeholder="Activity" class="input-field">
                        @error('activity')
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
                        <button class="submit-btn">ADD CALENDAR</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Calendar 
    let addCalendarLink = document.querySelector('#addCalendarLink')
    let addCalendar = document.querySelector('#addCalendar')
    let closeModaladdCalendar = document.querySelector('#closeModaladdCalendar')

    addCalendarLink.addEventListener('click', ()=>{
        if(addCalendar.classList.contains('hidden')){
            addCalendar.classList.remove('hidden');
        }else{
            addCalendar.classList.add('hidden');
        }
    })

    closeModaladdCalendar.addEventListener('click', ()=>{
        if(addCalendar.classList.contains('hidden')){
            addCalendar.classList.remove('hidden');
        }else{
            addCalendar.classList.add('hidden');
        }
    })
</script>