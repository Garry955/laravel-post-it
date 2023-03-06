<x-app-layout>
    <x-layout.hero>
        <h1 class="mb-10 text-4xl">
            <label class="text-green-500">
                {{ (!auth()->user() || auth()->user() && auth()->user()->id != $user->id) ? 'Profile of ' . $user->name : 'Your profile' }}
            </label>
        </h1>
    </x-layout.hero>
    {{-- Main heading user card --}}
    <div class="flex justify-items-stretch mx-10">
        <img class="w-1/3 mr-16 rounded-full"
            src="{{ $user->user_img_path
                ? asset('/storage/profile/user-' . $user->id . '/' . $user->user_img_path)
                : asset('/storage/images/user-default.jpg') }}">
        <x-user.card :user="$user" variant="simple" />
    </div>
    {{-- Portfolio section --}}
    <x-user.portfolio :user="$user" />
</x-app-layout>
