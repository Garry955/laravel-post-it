<x-layout>
    <div class="w-full p-20">
        <h1 class="mb-10 text-7xl">
            <b class="text-green-500">{{!auth()->user() ||  auth()->user()->id != $user->id ? "Profile of ".$user->name : "Your profile" }}</b>
        </h1>
        @if(auth()->user() && auth()->user()->id != $user->id)
            <div class="friend mb-5">
                {{-- {{ auth()->user()->id }} --}}
                @switch($status)
                    @case('user_requested')
                        <p>{{ $user->name }} has sent you a friend request.</p>
                        <x-button-link href="{{ route('reject.request', [$user]) }}" variant="outline-red" class="hover:scale-105">
                            Reject friend request
                        </x-button-link>
                        <x-button-link href="{{ route('accept.request', [$user]) }}" variant="success" class="hover:scale-105">
                            Accept friend request
                        </x-button-link>
                        @break
                    @case('my_friend')
                        <p>{{ $user->name }} is your friend since...</p>
                        <x-button-link href="{{ route('unfriend', [$user]) }}" variant="outline-red" class="hover:scale-105">
                            Unfriend user
                        </x-button-link>
                        @break
                    @case('friend_requested')
                        <p>You requested {{ $user->name }}</p>
                        <x-button-link href="{{ route('cancel.request', [$user]) }}" variant="red" class="hover:scale-105">
                            cancel request
                        </x-button-link> 
                        @break
                    @default
                        <x-button-link href="{{ route('send.request', [$user]) }}" variant="success" class="hover:scale-105">
                            Send friend request
                        </x-button-link>
                @endswitch
            </div>
        @endif
        <div id="profile" class="w-2/5 inline-block align-top">
            <div class="mb-6">
                <img src="{{ $user->user_img_path ? asset('/storage/'.$user->user_img_path) : asset('storage/images/user-default.jpg') }}" class="w-1/2">
            </div>
            <div class="mb-6">
                <p class="inline-block mb-2">Name:</p>
                <p class="font-black inline-block px-10 ml-2 bg-slate-400">{{ $user->name }}</p>
            </div>
            @if(auth()->user())
            <div class="mb-6">
                <p class="inline-block mb-2">Userame:</p>
                <p class="font-black inline-block px-10 ml-2 bg-slate-400">{{ $user->username }}</p>
            </div>
            @endif
            <div class="mb-6">
                <p class="inline-block mb-2">Gender:</p>
                <p class="font-black inline-block px-10 ml-2 bg-slate-400">{{ $user->username ? "Man" : "Woman" }}</p>
            </div>
            <div class="mb-6">
                <p class="inline-block mb-2">City:</p>
                <p class="font-black inline-block px-10 ml-2 bg-slate-400">{{ $user->city }}</p>
            </div>
            <div class="mb-6">
                <p class="inline-block mb-2">Email:</p>
                <p class="font-black inline-block px-10 ml-2 bg-slate-400">{{ $user->email }}</p>
            </div>
            <div class="mb-6">
                <p class="inline-block mb-2">Description:</p>
                <p class="font-black inline-block px-10 ml-2 bg-slate-400">{{ $user->description }}</p>
            </div>
        </form>
    </div>
    <div id="recents" class="w-1/2 inline-block items-stretch">
        <h2 class="mb-5 text-5xl">Recent posts of <a href="/user/{{ $user->id }}/show" class="text-green-400"> {{ $user->name }}</a></h2>
        @if (empty($posts->all()))
            <h3 class="text-3xl" >No posts yet..</h3>
        @else
            <div class="holder block w-full mb-10">
                <a href="/user/{{ $user->id }}/posts" class="mb-4 px-5 py-2 bg-green-500 rounded-lg hover:bg-slate-600">See all posts</a>
            </div>
            @foreach ($posts as $post)
                <div class="rounded-lg bg-blue-400 border-solid border-2 border-slate-500 w-full h-auto p-5 mb-8">
                    <h4 class="inline-block">{{ $post->heading }}</h4>
                    <div class="delete inline-block float-right">
                        <time class="">{{ $post->created_at->format('M.d/G:i') }}</time>
                    </div>
                    @if($post->img_path)
                        <a href="{{asset('/storage/' . $post->img_path)}}" target="_blank">
                            <img src="{{asset('/storage/' . $post->img_path)}}" alt="{{ $post->heading }}" class="w-64 my-4 rounded-lg">
                        </a>
                    @endif
                    <div class="w-full rounded-lg shadow-md mt-2 border-solid border-2 border-slate-700 h-auto p-3">
                        <p class="text-blue 200">{{ $post->text }}</p>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div>
</x-layout>