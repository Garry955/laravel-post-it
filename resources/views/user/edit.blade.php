<x-app-layout>
    {{-- Hero Section --}}
    <x-layout.hero>
        <h1 class="mb-10 text-4xl">
            Update your profile
            <x-button-link href="{{ route('user.profile', auth()->user()->id) }}" variant="link" class="ml-16">
                ...
                {{ auth()->user()->name }}
            </x-button-link>
        </h1>
    </x-layout.hero>
    {{-- Profile Form section --}}
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
    {{-- DELETE USER SECTION --}}
    <x-form.form id="delete_profile" route="{{ route('user.delete', auth()->user()->id) }}" method="delete"
        class="pb-16 w-4/5 mx-auto">
        {{-- TODO: AlpineJs confirm delete popup or smth. --}}
        <x-form.button variant="red" class="py-3"
            @click=" confirm('Are you sure?') ? @this.user.delete({{ auth()->user()->id }}) : false"><i
                class="fa-solid fa-trash-can mr-2"></i>Delete Profile
        </x-form.button>
    </x-form.form>
</x-app-layout>
