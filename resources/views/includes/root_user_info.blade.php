<div class="bg-white py-3 px-6 ml-4 mr-8 rounded grid grid-cols-3 gap-3 items-center">
    <div class="flex py-2 items-center">
        <span class="mr-4">
            <img class="w-12 rounded-full" src="{{ \App\Models\User::where(['category' => 1])->pluck('photo')->first() != null ? \App\Models\User::where(['category' => 1])->pluck('photo')->first() : asset('/images/logo.png') }}" alt="{{ Auth::user()->name }} Photo">
        </span>
        <span class="text-sm">
            <div class="font-semibold mb-1">{{ Auth::user()->name }}</div>
            <div>
                <span class="font-semibold">Staff ID:</span> 
                {{ Auth::user()->user_id }}
            </div>
        </span>
    </div>
    <div>
        <span class="text-sm">
            <div class="font-semibold mb-1">Position</div>
            <div>
                Root
            </div>
        </span>
    </div>
</div>