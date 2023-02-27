<!doctype html>
<html class="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>POST-IT</title>
  </head>
  <body class="antialiased relative text-white dark:bg-[#00132b]">
      {{-- Flash massege to render session messages --}}
      <x-flash-message />
      
      {{-- Navbar section --}}
      <x-layout.navbar />

      {{-- Main wrapper --}}
      <div class="min-h-screen bg-gray-100 dark:bg-gray-800 md:w-3/6 md:ml-[16.66%] md:mr-auto md:border-r-white md:border-r-2">
          {{-- Main section --}}
          {{ $slot }}        
      </div>
  
      {{-- Sidebar --}}
      <x-layout.sidebar />
{{-- TODO:SIDEBAR --}}
      
          {{-- Import app.js --}}
          @vite('resources/js/app.js')
  </body>
</html>