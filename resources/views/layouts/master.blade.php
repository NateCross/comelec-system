<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('dist/styles.css') }}">

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body>

  <div class="page">
    <div class="page__header">

      @include('layouts.inc.navbar');
      @include('components.menus');
      @include('components.modals');

      
    </div>
    <main class="page__content">
      
      @yield('content');

    </main>
  </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>