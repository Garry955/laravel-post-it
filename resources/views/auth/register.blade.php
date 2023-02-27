<x-app-layout>
    <x-layout.hero>
        <h1 class="mb-10 text-3xl">Registration
        </h1>
        <span>
            Already have an account?
            <x-button-link href="{{ route('login') }}" variant="link" >
                Log In Here
            </x-button-link>
        </span>
    </x-layout.hero>
    <x-form.form id="register" route="{{ route('user.store') }}" class="w-4/5 mx-auto pb-16 my-16">
        <x-form.form-input type="text" name="name" value="{{ old('name') }}" labelText="Name"  placeholder="Name"/>
        <x-form.form-input type="text" name="username" value="{{ old('username') }}" labelText="username"  placeholder="Userame"/>
        {{-- Gender Select!!!! --}}
        <x-form.radio-input values="Man,Woman" labelText="Gender" name="gender"/>
        
        <x-form.form-input type="text" name="city" value="{{ old('city') }}" labelText="City"  placeholder="City"/>
        <x-form.form-input type="email" name="email" value="{{ old('email') }}" labelText="E-mail"  placeholder="E-mail"/>
        {{-- Description textbox!!! --}}
        <x-form.text-area 
            name="description" labelText="Describe yourself.. (Optional)" placeholder="Description.." value="{{ old('description') }}"/>

        {{-- File input photo!! --}}
        <x-form.file-input labelText="Upload your profile picture"/>
        
        <x-form.form-input type="password" name="password" value="{{ old('password') }}" labelText="Password"  placeholder="Password"/>
        <x-form.form-input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" labelText="Confirm password"  placeholder="Password Confirmation"/>
        
        <x-form.button class="mt-10">Register</x-form.button>
        <x-form-dots/>
    </x-form.form>
    {{-- <form id="register" class="" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label class="inline-block text-lg mb-2 w-1/3"  for="name">Name</label>
            <input type="text" name="name" class="border border-gray-200 rounded p-2" placeholder="Name" value="{{ old('name') }}" >
        </div>
        <div class="error text-red-500 inline-block border-b-red-500">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-6">
            <label class="inline-block text-lg mb-2 w-1/3"  for="username">Userame</label>
            <input type="text" name="username" class="border border-gray-200 rounded p-2" placeholder="Username" value="{{ old('username') }}">
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
                            <input type="radio" id="contactChoice0" name="gender" value="0" checked/>
                            <label class="inline-block text-black bold" for="contactChoice0">Women</label>
                        </div>
                        <input type="radio" id="contactChoice1" name="gender" value="1" default/>
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
            <input type="text" name="city" class="border border-gray-200 rounded p-2" placeholder="City" value="{{ old('city') }}" >
        </div>
        <div class="error text-red-500 inline-block border-b-red-500">
            @error('city')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-6">
            <label class="inline-block text-lg mb-2 w-1/3"  for="password">Email</label>
            <input type="email" name="email" class="border border-gray-200 rounded p-2" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="error text-red-500 inline-block border-b-red-500">            
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-6">
            <label class="inline-block text-lg mb-2 w-1/3"  for="user_img">Profile picture</label>
            <input type="file" name="user_img" class="border border-gray-200 rounded p-2" placeholder="Photo">
        </div>
        <div class="mb-6">
            <label class="inline-block text-lg mb-2 w-full"  for="description">Describe yourself../optional/</label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="description">
                {{ old('description')}}
            </textarea></div>
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
        <div class="w-full mt-4">
            <button class="rounded-lg border-solid-black shadow-10 bg-slate-600 px-10 py-2 text-white" name="submit" id="submit">Register</button>
        </div>
    </form> --}}
</x-app-layout>