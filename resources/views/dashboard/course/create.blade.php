<div id="addCourse" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Add Course</span>
                <span id="closeModaladdCourse" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- Course Create  -->
                <form action="{{ route('course-create') }}" method="POST" class="px-6 lg:px-8 py-8">
                    @csrf
                    <div>
                        <label for="name" class="input-title">Course Name</label><br>
                        <input type="text" name="name" placeholder="Course Name" class="input-field">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-4">
                        <label for="course_type" class="input-title">Course Type</label><br>
                        <select name="course_type" placeholder="Course Type" class="input-field">
                            <option value=""></option>
                            <option value="Elective">Elective</option>
                            <option value="Core">Core</option>
                        </select>
                        @error('course_type')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-4">
                        <label for="course_code" class="input-title">Course Code</label><br>
                        <input type="text" name="course_code" placeholder="Course Code" class="input-field">
                        @error('course_code')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-4">
                        <label for="course_unit" class="input-title">Course Unit</label><br>
                        <input type="text" name="course_unit" placeholder="Course Unit" class="input-field">
                        @error('course_unit')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="my-5">
                        <label for="department" class="input-title">Department Name</label><br>
                        <select name="department" class="input-field">
                            <option value=""></option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">ADD COURSE</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<script>
    // Create Department 
    let addCourseLink = document.querySelector('#addCourseLink')
    let addCourse = document.querySelector('#addCourse')
    let closeModaladdCourse = document.querySelector('#closeModaladdCourse')

    addCourseLink.addEventListener('click', ()=>{
        if(addCourse.classList.contains('hidden')){
            addCourse.classList.remove('hidden');
        }else{
            addCourse.classList.add('hidden');
        }
    })

    closeModaladdCourse.addEventListener('click', ()=>{
        if(addCourse.classList.contains('hidden')){
            addCourse.classList.remove('hidden');
        }else{
            addCourse.classList.add('hidden');
        }
    })
</script>