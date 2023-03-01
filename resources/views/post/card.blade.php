<!-- ====== Cards Section Start -->
<div
    class="py-7 border-b-primary border-b-2 mb-14 drop-shadow-lg
     text-left bg-slate-800 rounded-lg bg-opacity-20 w-11/12
     hover:transform hover:scale-105 hover:shadow-primary hover:shadow-inner ease-in-out duration-500">
    <div class="container flex flex-wrap w-full px-7">
        <div class="flex w-full justify-between mb-4">
            <a href="/user/{{ $post->user->id }}/show" class="text-[25px] text-primary hover:text-white inline-block">
                <img class="w-12 inline mr-1 rounded-full"
                    src="{{ $post->user->user_img_path ? asset('/storage/profile/user-' . $post->user->id . '/' . $post->user->user_img_path) : asset('/storage/images/user-default.jpg') }}">
                {{ $post->user->name }}
            </a>
            <div class="text-base inline-block italic">
                <time class="w-full block">{{ $post->created_at->format('M.d / G:i') }}</time>
                <span class="w-full block text-right text-primary">{{ $post->user->city }}</span>
            </div>
        </div>
        @if ($post->img_path)
            <img class="w-full" src="{{ asset('/storage/' . $post->img_path) }}" alt="{{ $post->user->name }}">
        @endif
        <div class="p-5 mt-5 border-l-primary border-l-2">
            <h3>
                <a href="javascript:void(0)"
                    class="text-white hover:text-primary mb-4 block text-xl font-semibold sm:text-[22px] md:text-xl lg:text-[22px] xl:text-xl 2xl:text-[22px]">
                    {{ $post->heading }}
                </a>
            </h3>
            <p class="text-body-color mb-7 text-base leading-relaxed">
                {{ $post->text }}
            </p>
        </div>
    </div>
    @if (auth()->user() && $post->user->id == auth()->user()->id)
        <div class="controls w-full text-right px-8 mb-4">
            <x-button-link href="{{ route('post.edit', $post) }}"><i
                    class="fa-sharp fa-solid fa-pen-to-square mr-2"></i>Modify</x-button-link>
            <x-form.form id="delete_post" route="{{ route('post.delete', $post) }}" method="delete"
                class="inline-block ml-5">
                <x-form.button variant="red"><i class="fa-solid fa-trash-can mr-2"></i>Delete</x-form.button>
            </x-form.form>
        </div>
    @endif
</div>
