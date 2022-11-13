<div class="py-7">
    <!-- logo  -->
    <div>
        <img class="w-1/2 mx-auto" src="{{ asset('images/logo.png') }}" alt="School Logo">
    </div>
    <!-- School Title  -->
    <div>
        <h1 class="text-center font-semibold px-10">{{ Auth::user()->name }}</h1>
    </div>
</div>