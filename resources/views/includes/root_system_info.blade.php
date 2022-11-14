<div class="py-7">
    <!-- logo  -->
    <div>
        <img class="w-1/2 mx-auto" src="{{ \App\Models\User::where(['category' => 1])->pluck('photo')->first() != null ? \App\Models\User::where(['category' => 1])->pluck('photo')->first() : asset('/images/logo.png') }}" alt="School Logo">
    </div>
    <!-- School Title  -->
    <div>
        <h1 class="text-center font-semibold px-10">{{ \App\Models\User::where(['category' => 1])->pluck('name')->first() }}</h1>
    </div>
</div>