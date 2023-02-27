<x-app-layout>
    <x-layout.hero class="flex-row">
        <h1 class="">Posts of 
            <x-button-link href="#" variant="link">
                {{ $user->name }}
            </x-button-link>
        </h1>
        <x-button-link href="{{ route('post.create') }}" variant="link" class="inline-block ml-10">
            Post something here
        </x-button-link>
    </x-layout.hero>
    FRIEND RÉSZ A SIDEBARBA
    <div class="py-16 w-4/5 mx-auto ">
        @if (empty($user->post()->get()->toArray()))
            <h3 class="text-3xl" >No posts yet..</h2>
        @else
            @foreach ($user->post()->latest()->simplePaginate(30) as $post)
                <x-post.card :post="$post"/>
            @endforeach
        @endif
    </div>
</x-app-layout>