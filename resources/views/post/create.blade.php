<x-app-layout>
  <x-layout.hero>
    <h1 class="">Create a new Post</b></h1>
  </x-layout.hero>
  <x-form.form id="post" route="{{ route('post.store') }}" class="w-4/5 mx-auto">
    
    <x-form.form-input type="text" name="heading" value="{{ old('heading') }}" labelText="Post Heading"  placeholder="Heading text"/>
    {{-- Description textbox!!! --}}
    <x-form.text-area name="text" labelText="Text" placeholder="Text" value="{{ old('text') }}"/>
    {{-- File input photo!! --}}
    <x-form.file-input labelText="Picture" type="file" id="file" name="file"/>
    <x-form.button class="mt-14 py-3">Post</x-form.button>
  </x-form.form>
</x-app-layout>