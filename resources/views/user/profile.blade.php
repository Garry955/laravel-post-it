<x-app-layout>
    <x-layout.hero>
        <h1 class="mb-10 text-4xl">
            <b class="text-green-500">Profile of {{ auth()->user()->name }}</b>
        </h1>
    </x-layout.hero>
    <div>
        Profilkép
        Alap adatok : Név, ismerősök listája, postok száma
        Módosítás gomb
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