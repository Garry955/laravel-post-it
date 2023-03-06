{{-- User Card Section Start --}}
<div
    {{ $attributes->class([
        'mb-10 overflow-hidden rounded-lg border-primary border-2 text-white text-left w-3/4 mx-auto' => $variant === 'full',
        'mb-10 border-b-primary border-b-2 text-white text-left w-full mx-auto' => $variant === 'simple'
        ])}}>
    <div class="p-8 flex flex-col">
        @if ($variant === 'full')
            <div class="w-full flex items-stretch mb-2">
                <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Name</label>
                <label class="w-full text-[22px] ml-4 text-primary">{{ $user->name }}</label>
            </div>
            <div class="w-full flex items-stretch mb-2">
                <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">E-mail</label>
                <label class="w-full text-[22px] ml-4 text-primary">{{ $user->email }}</label>
            </div>
            <div class="w-full flex items-stretch mb-2">
                <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Username</label>
                <label class="w-full text-[22px] ml-4 text-primary">{{ $user->username }}</label>
            </div>
            <div class="w-full flex items-stretch mb-2">
                <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">City</label>
                <label class="w-full text-[22px] ml-4 text-primary">{{ $user->city }}</label>
            </div>
            <div class="w-full flex items-stretch mb-2">
                <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Gender</label>
                <label
                    class="w-full text-[22px] ml-4 text-primary">{{ $user->gender == 0 ? 'Male' : 'Female' }}</label>
            </div>
            <div class="w-full flex items-stretch mb-2">
                <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Description</label>
                <label
                class="w-full text-[22px] ml-4 text-primary">{{ $user->description ? $user->description : 'No description' }}</label>
            </div>
        @elseif($variant === 'simple')
            <label class="text-[22px] text-primary">{{ $user->name }}</label>
            <label class="text-[22px] text-primary">@ {{ $user->city }}</label>
            <label class="">69 Friend(s)</label>
            <label class="">420 Post(s)</label>
            @if(auth()->user() && auth()->user()->id === $user->id)
                <x-button-link href="{{ route('user.edit') }}" variant="link" class="mt-8">
                    Update your profile
                </x-button-link>
            @endif
            {{-- Friend Control Buttons --}}
            <x-user.friend-controller :user="$user" />
            
        @endif
    </div>
</div>
{{-- User Card Section End --}}
