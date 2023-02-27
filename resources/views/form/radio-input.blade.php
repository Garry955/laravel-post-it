@if($labelText)
    <div class="form-field">
    <label class="block text-lg mb-2 w-full" for="{{ $name }}">{{ $labelText }}</label>
@endif
@foreach ($options as $key => $item)
        <label for="label-{{ $key }}" class="cursor-pointer select-none inline-block pr-5 align-middle">
            <div class="relative inline-block align-middle pr-1">
                <input type="radio" id="label-{{ $key }}" name="{{ $name }}" value="{{ $key }}" {{ $key === 0 ? 'checked' : '' }} class="sr-only" />
                <div class="box flex h-5 w-5 items-center justify-center rounded border">
                    <span class="dot h-[10px] w-[10px] rounded-sm"></span>
                </div>
            </div>
            {{ $item }}
            {{-- {{ $choice }} --}}
        </label>
@endforeach
@if($labelText)
    </div>
@endif
@if($errorable)
    <div class="error text-red-500 inline-block border-b-red-500">
        @error($name)
            {{ $message }}
        @enderror
    </div>
@endif