<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    @vite('resources/scss/styles.scss')

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body>

  <div class="page">
    <div class="page__header">

      @include('layouts.inc.header');
      @include('layouts.components.menus');
      @include('layouts.components.modals');
      
    </div>
    <main class="page__content">
      
      @yield('content');

    </main>
  </div>
  {{-- @routes is for ziggy, which exposes the Laravel routes in JS --}}
  @routes
  @vite(['resources/js/app.js'])
</body>

</html>