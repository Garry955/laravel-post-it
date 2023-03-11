{{-- @forelse ($user as $friend)
    {{ $user }}
@empty
    No friends yet
@endforelse --}}
{{ $sentRequests }}
{{ $friendRequests }}
@forelse ($friends as $friend)
    {{ $friend }}
@empty
no friends yet.. :(
@endforelse
{{-- {{ $friends }} --}}