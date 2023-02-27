@if(!Route::currentRouteName())
<div id="posts" class="mt-10 p-10 border-t-2 border-t-green-500 items-center">
    @foreach ($posts as $post)
        <div class="rounded-lg bg-slate-500 border-black border-2 p5 mb-5 min-w-fit p-10 w-1/2">
            <h2 class="inline-block text-green-400">
                <a href="/user/{{ $post->user->id }}/show">
                    <img src="{{ $post->user->user_img_path ? asset('/storage/'.$post->user->user_img_path) : asset('storage/images/user-default.jpg') }}" class="max-h-10 inline-block ml-2 mb-3">
                     {{ $post->user->name }} 
                </a>
            </h2>
            <time class="inline-block float-right">{{ $post->created_at->format('M.d/G:i') }}</time>
            <span class="text-black text-xl block">{{ $post->heading }}</span>
            @if($post->img_path)
                <img src="{{ asset('/storage/'.$post->img_path) }}" alt="{{ $post->user->name }}">
            @endif
            <p>{{ $post->text }}</p>
        </div>
    @endforeach
</div>
<div id="pagination" class="mt-6 p-4 block max-h-12">
    {{ $posts->links() }}
</div>
@endif