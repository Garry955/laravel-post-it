<x-app-layout>
    <x-layout.hero>
        <h1 class="mb-10 text-4xl">
            <label class="text-green-500">
                {{ (!auth()->user() || auth()->user() && auth()->user()->id != $user->id) ? 'Friends of ' . $user->name : 'Your Friends' }}
            </label>
        </h1>
    </x-layout.hero>
    <x-friend.friend-list/>
    {{-- @forelse ($friends as $friend)
        {{ $friend }}
    @empty
        No friends yet.. :(
    @endforelse --}}
</x-app-layout>