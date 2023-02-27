<x-app-layout>
  <x-layout.hero>
    <h1 class="inline-block">Hello <b class="text-green-500">{{ auth()->user() ? auth()->user()->name : 'Guest' }}</b></h1>
        @if (!auth()->user())
            <span class="inline-block">
                If you want to post something 
                <x-button-link href="{{ route('register') }}" variant="link"> Register Now</x-button-link>
                Or..
                <x-button-link href="{{ route('login') }}" variant="link"> Log In</x-button-link>
            </span>
        @endif
  </x-layout.hero>
  {{-- Posts section --}}
  <x-home.posts />
</x-app-layout>