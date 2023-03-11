{{-- @forelse ($user as $friend)
    {{ $user }}
@empty
    No friends yet
@endforelse --}}
@forelse ($friends as $friend)
    {{ $friend->name }}
@empty
no friends yet.. :(
@endforelse
{{-- {{ $friends }} --}}