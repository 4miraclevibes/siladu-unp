<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/logo-white.svg') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Labterpadu</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .description-container .description {
          width: 100%;
          word-wrap: break-word;
          overflow-wrap: break-word;
      }

      .description-container img {
        max-width: 100%;
      }

      .description-container figcaption{
        text-align: center;
      }

      .description-container figure .media{
        border: 1px solid #000;
        width: 100px;
      }

      body > div.container.my-5 > div > div > div > div > div.announcement-content > figure > img {
        max-width: 1000px;
        min-width: 100%;
        margin: 0 auto;
        display: block;
      }

      body > div.container.my-5 > div > div > div > div > div.article-content > p > img{
        max-width: 1000px;
        margin: 0 auto;
        display: block;
        min-width: 100%;
      }
    </style>
    @stack('styles')
  </head>
  <body style="font-family: 'Poppins', sans-serif;">
    @include('layouts.frontend.navbar')
    <div class="blank" style="height: 30px"></div>
    @yield('content')
    @include('layouts.frontend.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    @stack('scripts')
  </body>
</html>