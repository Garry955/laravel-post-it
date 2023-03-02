<x-app-layout>
    <x-layout.hero class="mb-20">
        <h1 class="">Edit Post: {{ $post->heading }}</b></h1>
    </x-layout.hero>
    TODO :FRIENDS LIST HERE @ SIDEBAR
    <x-form.form id="update_post" route="{{ route('post.update', $post) }}" method="put" class="w-4/5 mx-auto pb-40">
        <x-form.form-input type="text" name="heading" value="{{ old('heading') ? old('heading') : $post->heading }}"
            labelText="Post Heading" placeholder="Heading text" />
        {{-- Description textbox --}}
        <x-form.text-area name="text" labelText="Text" placeholder="Text"
            value="{{ old('text') ? old('text') : $post->text }}" />
        {{-- File input photo --}}
        @if ($post->img_path)
            <label class="block mb-2">Current picture</label>
            <img src="{{ asset('/storage/' . $post->img_path) }}" alt="{{ $post->heading }}" class="w-1/2 mb-5">
        @endif
        <x-form.file-input labelText="Upload new picture" type="file" id="file" name="file" />
        <x-form.button class="mt-14 py-3">Update post</x-form.button>
    </x-form.form>
</x-app-layout>
