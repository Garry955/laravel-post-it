<a href="{{ $href }}" target="{{ $target = '_self' }}" {{ $attributes->class([
    // 'rounded-lg border inline-block transition hover:transition-all hover:ease-in-out hover:duration-500 hover:transform',
    'hover:transition hover:transition-all hover:ease-in-out hover:duration-500 hover:transform',
    'border-none text-green-500 drop-shadow-lg hover:text-slate-300' => $variant === 'link',
    'border-red w-full rounded border-red-500 border-2 text-red-500 hover:text-white hover:scale-105 hover:bg-red-500' => $variant === 'red',
    'border-primary w-full rounded border-2 border-primary text-primary hover:text-white hover:bg-primary hover:scale-105' => $variant === 'primary'
    // 'py-4 px-6 md:px-9 bg-primary hover:border-primary hover:text-white' => $variant === 'success',
    // 'py-4 px-6 md:px-9 hover:bg-red-700 hover:border-red-700 hover:text-white' => $variant === 'outline-red',
    // 'py-4 px-6 md:px-9 bg-red-700 border-red-700 text-white hover:bg-red-800' => $variant === 'red',
    // 'py-4 px-6 md:px-9 bg-gray-900 border-gray-700 text-white hover:bg-gray-800' => $variant === 'dark',
    // 'py-4 px-6 md:px-9 bg-black border-primary text-primary hover:text-white hover:bg-opacity-80 bg-opacity-30' => $variant === 'primary',

    ]) 
}}>
{{ $slot }}
</a>