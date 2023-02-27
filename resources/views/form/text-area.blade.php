<div class="form-field mb-6">
    @if($labelText)
        <label class="inline-block text-lg mb-2 w-1/3" for="{{ $name }}">{{ $labelText }}</label>
    @endif
    <textarea name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        {{ $attributes->class([
        "border-[f0f0f0] bg-white text-black focus:border-primary w-full rounded border py-3 px-[14px]
         text-base outline-none focus-visible:shadow-none placeholder:text-green-600"    ]) }}>
         {{ $value }}
    </textarea>
    @if($errorable)
    <div class="error text-red-500 inline-block border-b-red-500 mt-2">
        @error($name)
            {{ $message }}
        @enderror
    </div>
    @endif
</div>
