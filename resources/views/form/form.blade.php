<div {{ $attributes->class([
    "relative"
])}}>
        <form id="{{ $id }}" method="POST" action="{{ $route }}" enctype="{{ $enctype }}">
            @csrf
            @if($method)
                @method($method)
            @endif
            {{ $slot }}
        </form>
</div>