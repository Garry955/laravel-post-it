<section x-data="{
    selectedTab: 'Posts',
    activeClasses: 'bg-primary text-white',
    inactiveClasses: 'text-body-color hover:bg-primary hover:text-white',
}" class="py-20">
    <div class="-mx-4 flex flex-wrap justify-center">
        <div class="w-full px-4">
            <ul class="mb-12 flex flex-wrap justify-center space-x-1">
                @foreach ($tabs as $tab)
                    <li class="mb-1">
                        <button @click="selectedTab = '{{ $tab }}' "
                            :class="selectedTab == '{{ $tab }}' ? activeClasses : inactiveClasses"
                            class="inline-block rounded-lg py-2 px-20 text-center text-base font-semibold transition md:py-3">
                            {{ $tab }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div :class="selectedTab == 'Posts' || selectedTab == 'Posts' ? 'block' : 'hidden'" class="w-full px-16">
        @forelse ($posts as $post)
            <x-post.card :post="$post" />
        @empty
            <h3 class="inline-block mr-10 text-2xl">No posts yet..</h3>
            @if (auth()->user() && auth()->user()->id != $user->id)
                <x-button-link variant="link" href="{{ route('post.create') }}" class="text-2xl">
                    Post something
                </x-button-link>
            @endif
        @endforelse
    </div>
    <div :class="selectedTab == 'Details' || selectedTab == 'Details' ? 'block' : 'hidden'" class="w-full px-4">
        <x-user.card :user="$user" />
    </div>
</section>
