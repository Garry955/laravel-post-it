<a href="{{ $href }}" target="{{ $target }}" {{ $attributes->class([
    'hover:transition hover:transition-all hover:ease-in-out hover:duration-500 hover:transform',
    'border-none text-green-500 drop-shadow-lg hover:text-slate-300' => $variant === 'link',
    'border-red w-full rounded border-red-500 border-2 text-red-500 hover:text-white hover:scale-105 hover:bg-red-500' => $variant === 'red',
    'border-primary w-full rounded border-2 border-primary text-primary hover:text-white hover:bg-primary hover:scale-105' => $variant === 'primary'
 ]) 
}}>
{{ $slot }}
</a>