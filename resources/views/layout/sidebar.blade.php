{{-- Sidebar section starts --}}
<div id="sidebar" class="w-2/6 absolute top-0 right-0 pt-48 pl-12 pr-24">
    @if(Route::current()->getName() === 'post.create')
        <h2 class="mb-16 text-3xl inline-block">Recent posts of <a href="/user/{{ $user->id }}/edit" class="text-green-400"> {{ $user->name }}</a></h2>
            @if (empty($posts->all()))
                <h3 class="text-3xl" >No posts yet..</h2>
            @else
                <x-button-link href="{{ route('post.list', $user) }}" class="text-[24px] py-0">See all posts</x-button-link>
                @foreach ($posts as $post)
                    <x-post.card :post="$post"/>
                @endforeach
            @endif
    @endif

    {{-- <h4 class="text-left mb-10 text-5xl">Friends</h4>
    <span class="block text-left mb-10 text-4xl"><b class="text-green-500">No</b> Pending Requests..</span>
        <x-button-link href="#" 
            class="text-[25px]
            py-5 px-3 px w-full leading-[68px] flex justify-around h-[110px] mb-3 text-left hover:scale-105 ">
            <img class="h-[60px] inline rounded-full" src="{{ asset('/storage/images/user-default.jpg')}}"> --}}
            {{-- <img class="w-12 inline mr-1 rounded-full"
                    src="{{ $post->user->user_img_path ? asset('/storage/'.$post->user->user_img_path) : asset('/storage/images/user-default.jpg') }}"> --}}
                {{-- {{ $post->user->name }} --}}
                {{-- Marosy Gergő asd 
                <i class="fa-solid fa-arrows-turn-right before:leading-[68px]"></i>
        </x-button-link>
        <x-button-link href="#" 
            class="text-[25px]
            py-5 px-3 px w-full leading-[68px] flex justify-around h-[110px] mb-3 text-left hover:scale-105 ">
            <img class="h-[60px] inline rounded-full" src="{{ asset('/storage/images/user-default.jpg')}}"> --}}
            {{-- <img class="w-12 inline mr-1 rounded-full"
                    src="{{ $post->user->user_img_path ? asset('/storage/'.$post->user->user_img_path) : asset('/storage/images/user-default.jpg') }}"> --}}
                {{-- {{ $post->user->name }} --}}
                {{-- Marosy Gergő 
                <i class="fa-solid fa-arrows-turn-right before:leading-[68px]"></i>
        </x-button-link> --}}
    
</div>
{{-- Sidebar section ends --}}