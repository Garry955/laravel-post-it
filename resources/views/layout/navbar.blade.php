<!-- ====== Navbar Section Start -->
<header x-data="{navbarOpen: false}"
    class="fixed left-0 top-0 bottom-0 md:w-1/6 sm:flex sm:w-full sm:items-center md:items-start md:pt-48 bg-none text-white md:border-r-2 md:border-white">
    <div class="container mx-auto">
        <div class="relative -mx-4 flex items-center flex-col justify-between">
            {{-- Logo container --}}
            <div class="px-4 md:w-full md:text-center">
                <a href="{{ route('home') }}" class="block py-5 text-5xl hover:text-green-500 transition-all ease-in-out">
                    <i class="fa-solid fa-spaghetti-monster-flying inline-block"></i>
                    <span id="logo-text" class="text-4xl inline-block">POST-IT</span>
                </a>
            </div>
            {{-- Navbar items container --}}
            <div class="flex items-center flex-col justify-between px-4 md:w-full md:text-center">
                <x-layout.navbar-hamburger @click="navbarOpen = !navbarOpen" x-bind:class="navbarOpen && 'navbarTogglerActive'"></x-layout.navbar-hamburger>
                <nav :class="!navbarOpen && 'hidden' " id="navbarCollapse"
                    class="absolute right-4 top-full w-full max-w-[250px] py-5 px-6 rounded-b-lg shadow lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none md:">
                    <ul class="block lg:flex md:flex-col">
                        @foreach ($navigationItems as $item)
                            <x-layout.navbar-item :href="$item['href']">{{ $item['label'] }}</x-layout.navbar-item>    
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ====== Navbar Section End -->