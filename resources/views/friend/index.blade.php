<x-layout>
    <div class="w-1/2 inline-block">
        <h2 class="text-3xl">Your friends</h2>
        @foreach ($friends as $user)
            <div class="border-2 border-black p-4 mt-5 bg-slate-400 rounded-lg">
                <img 
                    src="{{ $user->user_img_path ? asset('/storage/'.$user->user_img_path) : asset('storage/images/user-default.jpg') }}"
                     class="w-20 inline-block align-top">
                <div class="w-auto inline-block px-5">
                    <div class="inline-block float-right">
                        <form method="POST" action="/user/{{ $friendStatus['relationId'] }}/remove" class="max-w-3xl mb-10">
                            @csrf
                            @method('delete')
                            <button class="rounded-lg border-solid-black shadow-10 mt-5 w-full bg-red-500 px-10 py-2 text-white" name="submit">Ismerős törlése</button>
                        </form>  
                    </div>
                    <span class="block" >{{ $user->name }}</span>
                    <span class="block" >{{ $user->email }}</span>
                    <span class="block" >{{ $user->city }}</span>
                    <span class="block" >{{ $user->gender ? "Male" : "Female" }}</span>
                </div>
                <div class="block">
                    {{ $user->description }}
                </div>
            </div>
        @endforeach
    </div>
</x-layout>