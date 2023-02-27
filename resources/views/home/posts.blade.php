<div id="posts" class="pt-14 mt-14 border-t-white border-t-2 pl-24 flex flex-col">
    @foreach ($posts as $post)
        <x-post.card :post="$post" />
    @endforeach
</div>
<div id="pagination" class="mt-6 p-4 block max-h-12">
    {{ $posts->links() }}
</div>