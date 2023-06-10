<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Voting System' }}</title>
  <!-- CSS Link -->
  @vite('resources/css/styles.css')
  <!-- Font Awesome Link -->
  <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>

<body>

  <div class="page">
    <div class="page__header">

      <x-inc.header/>
      @include('components/menus')
      @include('components/modals')

    </div>
    <main class="page__content">
      
      {{ $slot }}

    </main>
  </div>

  @vite([
    'resources/js/script.js',
    'resources/js/message.js',
  ])

</body>

</html>