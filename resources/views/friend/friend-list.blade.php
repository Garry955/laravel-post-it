{{-- @forelse ($user as $friend)
    {{ $user }}
@empty
    No friends yet
@endforelse --}}
{{-- {{ $sentRequests }}
{{ $friendRequests }} --}}
<h1>YOUR FRIENDS</h1>
{{ $friends }}
<h1>SENT FRIEND REQUESTS</h1>
{{ $sentRequests }}
<h1>RECEIVED FRIEND REQUESTS</h1>
{{ $friendRequests }}
{{-- {{ $friends }} --}}