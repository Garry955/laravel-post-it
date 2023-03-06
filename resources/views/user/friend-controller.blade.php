{{-- Friend Controls Section --}}
@if(auth()->user() && auth()->user()->id != $user->id)
<div class="friend mb-5">
    @switch($status)
        @case('user_requested')
            <p>{{ $user->name }} has sent you a friend request.</p>
            <x-button-link href="{{ route('friend.rejectRequest', [$user]) }}" variant="outline-red" class="hover:scale-105">
                Reject friend request
            </x-button-link>
            <x-button-link href="{{ route('friend.acceptRequest', [$user]) }}" variant="success" class="hover:scale-105">
                Accept friend request
            </x-button-link>
            @break
        @case('my_friend')
            <p>{{ $user->name }} is your friend since...</p>
            <x-button-link href="{{ route('friend.unfriend', [$user]) }}" variant="outline-red" class="hover:scale-105">
                Unfriend user
            </x-button-link>
            @break
        @case('friend_requested')
            <p>You requested {{ $user->name }}</p>
            <x-button-link href="{{ route('friend.cancelRequest', [$user]) }}" variant="red" class="hover:scale-105">
                cancel request
            </x-button-link> 
            @break
        @default
            <x-button-link href="{{ route('friend.sendRequest', [$user]) }}" variant="success" class="hover:scale-105">
                Send friend request
            </x-button-link>
    @endswitch
</div>
@endif