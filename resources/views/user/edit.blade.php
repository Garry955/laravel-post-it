{{-- @if ($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif --}}
<x-app-layout>
    <x-layout.hero>
        <h1 class="mb-10 text-4xl">
            Update your profile
            <x-button-link href="{{ route('user.profile', auth()->user()->id) }}" variant="link"
                class="absolute top-0 right-0">
                {{ auth()->user()->name }}
            </x-button-link>
        </h1>
    </x-layout.hero>
    <x-form.form id="update_profile" method="put" route="{{ route('user.update') }}" class="w-4/5 mx-auto">
        <img src="{{ auth()->user()->user_img_path ? asset('/storage/profile/user-' . auth()->user()->id . '/' . auth()->user()->user_img_path) : asset('/storage/images/user-default.jpg') }}"
            alt="{{ auth()->user()->name }}" class="w-1/2 mb-5">

        <x-form.file-input labelText="Upload picture" />
        <x-form.form-input type="text" labelText="Name" name="name" placeholder="Name"
            value="{{ old('name') ? old('name') : auth()->user()->name }}" />
        <x-form.form-input type="text" labelText="Username" name="username" placeholder="Username"
            value="{{ old('username') ? old('username') : auth()->user()->username }}" />
        <x-form.form-input type="email" labelText="E-mail" name="email" placeholder="E-mail"
            value="{{ old('email') ? old('email') : auth()->user()->email }}" />
        <x-form.form-input type="text" labelText="City" name="city" placeholder="City"
            value="{{ old('city') ? old('city') : auth()->user()->city }}" />
        <x-form.radio-input values="Man,Woman" labelText="Gender" name="gender" />
        <x-form.text-area labelText="Description" name="description">
            {{ old('description') ? old('description') : auth()->user()->description }}
        </x-form.text-area>
        <p class="text-red-500 leading-loose">
            <i class="fa-sharp fa-solid fa-circle-info text-2xl mr-2"></i>
            Notice: Any changes require your current password to be modified.
        </p>
        <x-form.form-input type="password" labelText="Current password" name="current_password"
            placeholder="Current password" />
        <x-form.form-input type="password" labelText="New password" name="password" placeholder="New password" />
        <x-form.form-input type="password" labelText="New password confirmation" name="password_confirmation"
            placeholder="New password confirmation" />

        <x-form.button class="py-3 my-14">Update</x-form.button>
    </x-form.form>
</x-app-layout>

{{-- <x-layout>
    <div class="flex flex-col w-1/2 p-20">
        <h1 class="mb-10 text-7xl">Update your profile</h1>
        <form id="profile" class="max-w-3xl" method="POST" action="/user/{{ $user->id }}/update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="user_img">Profile picture</label>
                <input type="file" name="user_img" class="border border-gray-200 rounded p-2" placeholder="Photo">
                <img src="{{ auth()->user()->user_img_path ? asset('/storage/' . auth()->user()->user_img_path) : asset('/storage/images/no-image.jpg') }}" alt="{{ auth()->user()->name }}" class="w-64 mt-4">
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="name">Name</label>
                <input type="text" name="name" class="border border-gray-200 rounded p-2" placeholder="Name" value="{{ old('name') ? old('name') : $user->name }}" >
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="username">Userame</label>
                <input type="text" name="username" class="border border-gray-200 rounded p-2" placeholder="Username" value="{{ old('username') ? old('username') : $user->username }}" >
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('username')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <fieldset>
                    <label class="inline-block text-lg mb-2 w-1/3"  for="gender">Gender</label>
                        <div class="mb-2 inline-block">
                            <div class="mb-2 inline-block">
                                <input type="radio" id="contactChoice0" name="gender" value="0"  {{ !$user->gender ? "checked" : ""}} />
                                <label class="inline-block text-black bold" for="contactChoice0">Women</label>
                            </div>
                            <input type="radio" id="contactChoice1" name="gender" value="1" {{ $user->gender ? "checked" : ""}}/>
                            <label class="inline-block text-black bold" for="contactChoice1">Man</label>
                        </div>
                        <div>
                  </fieldset>
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('gender')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="name">City</label>
                <input type="text" name="city" class="border border-gray-200 rounded p-2" placeholder="City" value="{{ old('city') ? old('city') : $user->city }}" >
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('city')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="password">Email</label>
                <input type="email" name="email" class="border border-gray-200 rounded p-2" placeholder="Email" value="{{ old('email') ? old('email') : $user->email }}" >
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">            
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-full"  for="description">Describe yourself../optional/</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="description">
                    {{ old('description') ? old('description') : $user->description }}
                </textarea>
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="password" >Password</label>
                <input type="password" name="password" class="border border-gray-200 rounded p-2" placeholder="Password" value="{{ old('password') }}">
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="password">Password confirmation</label>
                <input type="password" name="password_confirmation" class="border border-gray-200 rounded p-2" placeholder="Password confirmation" value="{{ old('password_confirmation') }}">
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-4 flex-auto">
                <button class="rounded-lg border-solid-black shadow-10 bg-green-400 px-10 py-2 text-white w-full" name="submit">Modify profile</button>
            </div>
        </form>
        <form action="/user/{{ $user->id }}/delete" method="POST" class="max-w-3xl">
            @csrf
            @method('delete')
            <button   class="rounded-lg border-solid-black shadow-10 mt-5 w-full bg-red-500 px-10 py-2 text-white" name="submit">Delete profile</button>
        </form>
    </div>
</x-layout> --}}
