<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <!-- Make Payment  -->
    @if($student_online->checkSessionPayment() == 'First Semester-0')
    <h1 class="text-lg font-semibold py-4">Make Payment</h1>
        <div id="SessionPaymentLink">
            <div class="settings-menu-div">
                <span class="bg-gray-300 px-2 py-3 rounded-full">
                    @include('icons.course')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Session Payment Receipt</h1>
                </span>
            </div>
            <div class="settings-menu-div">
                <span class="bg-gray-300 px-2 py-3 rounded-full">
                    @include('icons.course')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Department Payment Receipt</h1>
                </span>
            </div>
        </div>
    @elseif($student_online->checkSessionPayment() == 'Second Semester-0')
    <h1 class="text-lg font-semibold py-4">Make Payment</h1>
        <div class="settings-menu-div">
            <span class="bg-gray-300 px-2 py-3 rounded-full">
                @include('icons.course')
            </span>
            &nbsp;&nbsp;
            <span>
                <h1>Department Payment Receipt</h1>
            </span>
    </div>
    @elseif($student_online->checkSessionPayment() == 'First Semester-1')
        <h1 class="text-lg font-semibold py-4">Payment Comfirmed!</h1>
    @else
        <h1 class="text-lg font-semibold py-4">Payment not comfirmed yet!</h1>
    @endif
</div>

<div id="SessionPayment" class="hidden">
    <div id="modal">
        <div id="modal-content" class="rounded">
            <div id="modal-header" class="modal-header">
                <span>Upload Receipt</span>
                <span id="closeModalSessionPayment" class="cursor-pointer">X</span>
            </div>
            <div class="p-4">
                <!-- System Photo  -->
                <form action="{{ route('student-payment-semester') }}" method="POST" class="px-6 lg:px-8 py-8" enctype="multipart/form-data">
                    @csrf
                    <div class="flex">
                        <label for="session_year" class="text-lg font-medium border-b-4 border-green-700 ml-4">Session Receipt</label><br>
                        <input class="input-field" type="file" name="session_year">
                        @error('session')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="flex my-5">
                        <label for="semester" class="text-lg font-medium border-b-4 border-green-700 ml-4">Department Receipt</label><br>
                        <input class="input-field" type="file" name="semester">
                        @error('semester')
                            {{$message}}
                        @enderror
                    </div>     
                    <div class="text-center my-4">
                        <button class="submit-btn">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // System photo 
    let SessionPaymentLink = document.querySelector('#SessionPaymentLink')
    let SessionPayment = document.querySelector('#SessionPayment')
    let closeModalSessionPayment = document.querySelector('#closeModalSessionPayment')

    SessionPaymentLink.addEventListener('click', ()=>{
        if(SessionPayment.classList.contains('hidden')){
            SessionPayment.classList.remove('hidden');
        }else{
            SessionPayment.classList.add('hidden');
        }
    })

    closeModalSessionPayment.addEventListener('click', ()=>{
        if(SessionPayment.classList.contains('hidden')){
            SessionPayment.classList.remove('hidden');
        }else{
            SessionPayment.classList.add('hidden');
        }
    })
</script>