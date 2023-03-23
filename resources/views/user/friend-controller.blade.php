{{-- Friend Controls Section --}}
@if (auth()->user() && auth()->user()->id != $user->id)
    <div class="friend border-t-2 border-t-primary mt-3 pt-3">
        @switch($status)
            @case('received_request')
                <p class="block mb-4">{{ $user->name }} has sent you a friend request.</p>
                <x-button-link href="{{ route('friend.rejectRequest', [$user]) }}" variant="red" class="py-2 px-6 mt-4">
                    Reject friend request
                </x-button-link>
                <x-button-link href="{{ route('friend.acceptRequest', [$user]) }}" variant="primary" class="py-2 px-6 mt-4 ml-4">
                    Accept friend request
                </x-button-link>
            @break

            @case('friend')
                <p class="block mb-4">{{ $user->name }} is your friend since...</p>
                <x-button-link href="{{ route('friend.unfriend', [$user]) }}" variant="red" class="py-2 px-6 mt-4">
                    Unfriend user
                </x-button-link>
            @break

            @case('sent_request')
                <p class="block mb-4">You requested <b class="text-primary"> {{ $user->name }}</b> as a friend</p>
                <x-button-link href="{{ route('friend.cancelRequest', [$user]) }}" variant="red" class="py-2 px-6 mt-4">
                    cancel request
                </x-button-link>
            @break

            @default
                <p class="block mb-4">Do you know <b class="text-primary"> {{ $user->name }}</b>?</p>
                <x-button-link href="{{ route('friend.sendRequest', [$user]) }}" variant="primary" class="py-2 px-6">
                    Send friend request
                </x-button-link>
        @endswitch
    </div>
@endif
