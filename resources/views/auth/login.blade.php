<x-app-layout>
    <x-layout.hero>
        <h1 class="mb-10 text-3xl">Log into your account
        </h1>
        <span>
            Don't have an account?
            <x-button-link href="{{ route('register') }}" variant="link" >
                Register here
            </x-button-link>
        </span>
    </x-layout.hero>


    <x-form.form id="login" route="{{ route('authenticate') }}" class="w-4/5 mx-auto" method="get">
        <x-form.form-input type="email" name="email" value="{{ old('email') }}" labelText="E-mail"  placeholder="E-mail" errorable="0" />
        <x-form.form-input type="password" name="password" value="{{ old('email') }}" labelText="Password"  placeholder="Password"/>
        <x-form.button text="Login"/>
        <x-form-dots/>
    </x-form.form>
</x-app-layout>