<x-layout>
    <div class="inline-block w-auto px-20 pt-20">
        <h2 class="mb-5 text-5xl">Recent posts of <a href="/user/{{ auth()->id() }}/edit" class="text-green-400"> {{ $user->name }}</a></h2>
        @if (empty($posts->all()))
            <h3 class="text-3xl" >No posts yet..</h2>
        @else
        @foreach ($posts as $post)
            <div class="rounded-lg bg-blue-400 border-solid border-2 border-slate-500 w-full h-auto p-5 mb-8">
                <h4 class="inline-block">{{ $post->heading }}</h4>
                <div class="inline-block float-right">
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
</x-layout>