<x-app-layout>
    <x-layout.hero class="mb-20">
      <h1 class="">Edit Post: {{ $post->heading }}</b></h1>
    </x-layout.hero>
    TODO :FRIENDS LIST HERE @ SIDEBAR
    <x-form.form id="update_post" route="{{ route('post.update', $post) }}" method="put" class="w-4/5 mx-auto pb-40">
      <x-form.form-input type="text" name="heading" 
        value="{{ old('heading') ? old('heading') : $post->heading }}"
         labelText="Post Heading"  placeholder="Heading text"/>
      {{-- Description textbox!!! --}}
      <x-form.text-area name="text" labelText="Text" placeholder="Text" 
        value="{{ old('text') ? old('text') : $post->text }}"/>
      {{-- File input photo!! --}}
      @if($post->img_path)
        <label class="block mb-2">Current picture</label>
        <img src="{{ asset('/storage/'. $post->img_path) }}" alt="{{ $post->heading }}" class="w-1/2 mb-5">
      @endif
      <x-form.file-input labelText="Upload new picture" type="file" id="file" name="file"/>
      <x-form.button class="mt-10">Update post</x-form.button>
    </x-form.form>
</x-app-layout>

{{-- <x-layout>
    <div class="w-1/2 px-20 pt-20 inline-block align-top">
        <h1 class="mb-10 text-7xl">Edit Post <br> <b class="text-green-500">"{{ $post->heading }}"</b></h1>
        <form id="update_post" class="" method="POST" action="/post/{{ $post->id }}/update" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-full"  for="heading">Post heading </label>
                <input type="text" 
                    name="heading" 
                    class="border border-gray-200 rounded w-full p-2" 
                    placeholder="heading" value="{{ old('heading') ? old('heading') : $post->heading }}" >
            </div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('heading')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-1/3"  for="image">Upload picture</label>
                <input type="file" name="image" class="border border-gray-200 rounded p-2" placeholder="Image">
                @if($post->img_path)
                    <img src="{{ asset('/storage/'. $post->img_path) }}"
                        class="w-1/2 mt-5">
                @endif
            </div>
            <div class="mb-6">
                <label class="inline-block text-lg mb-2 w-full"  for="text">Text</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="text" rows="10" placeholder="text">
                    {{ old('text') ? old('text') : $post->text }}
                </textarea></div>
            <div class="error text-red-500 inline-block border-b-red-500">
                @error('text')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-4">
                <button class="rounded-lg border-solid-black shadow-10 bg-slate-600 px-10 py-2 text-white" name="submit" id="submit">Update post</button>
            </div>
        </form>
    </div>
</x-layout> --}}