<x-app-layout>
    <x-layout.hero>
        <h1 class="mb-10 text-4xl">
            <b class="text-green-500">Profile of {{ auth()->user()->name }}</b>
        </h1>
    </x-layout.hero>
    <div class="flex justify-items-stretch mx-10">
        <img class="w-1/3 mr-16 rounded-full"
            src="{{ $user->user_img_path ? asset('/storage/profile/user-' . $user->id . '/' . $user->user_img_path) :
                asset('/storage/images/user-default.jpg') }}">
        <x-user.card :user="auth()->user()" variant="simple"/>
    </div>
    <x-user.portfolio>
    </x-user.portfolio>
    <div>
        Pictures
    </div>
    <div>
        Posts
    </div>
    <div>
        Névjegy
    </div>
</x-app-layout>
