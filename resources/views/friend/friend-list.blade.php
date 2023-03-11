@forelse ($friends as $friend)
    {{ $friend }}
@empty
    No friends yet
@endforelse