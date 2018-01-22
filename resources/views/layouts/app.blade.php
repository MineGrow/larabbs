<?DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http_equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'LaraBBS') - YUE.MX</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="{{ route_class() }}-page" id="app">
    @include('layouts._header')

    <div class="container">
      @include('layouts._message')
      @yield('content')
    </div>

    @include('layouts._footer')
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
</body>
</html>
