<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>POST-IT</title>
</head>
<body style="margin-bottom:0">
  <main class="relative w-full pt-20 bg-sky-600 text-white font-medium h-full">
    <x-flash-message />
    <div class="container w-full m-auto">
      {{-- {{ var_dump(Route::currentRouteName()) }} --}}
      @include('partials._header')
      {{ $slot }}
    </div>
    @include('partials._footer')
    @vite('resources/js/app.js')
  </main>
</body>
</html>