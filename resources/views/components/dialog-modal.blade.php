<div class="items-center justify-center fixed z-50 w-full h-full" role="dialog" tabindex="-1" x-show="isModalOpen"
    x-on:click.away="isModalOpen = false" x-cloak x-transition>
    <div class="bg-black rounded-lg max-w-[600px] px-56 py-16 m-auto">
        <div class="flex items-center justify-between border-b-2 border-b-primary">
            <h3>{{ $text }}</h3>
            <button aria-label="Close" x-on:click="isModalOpen=false">✖</button>
        </div>
        <x-form.button text="I am sure" />
    </div>
</div>
<div class="w-full h-full fixed top-0 left-0 bg-black opacity-75" x-show="isModalOpen" x-cloak></div>
