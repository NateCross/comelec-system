<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- CSS Link -->
  @vite('resources/css/styles.css')
  <!-- Font Awesome Link -->
  <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="login">
    <div class="logo">
      <span>Title</span>
      <span>/Logo</span>
    </div>
    <div class="group">

    </div>
    @include('components/messages/short/short')
    <form action="" method="" class="modify hero">
      <div class="login-details">
        <span class="title">Sign in</span>
        <span class="description">Integer id ultricies risus. Donesuscipit neque lorem, eu aliquam nunc pellentesque.</span>
      </div>
      <div class="fields">
        <div class="field full">
          <label for="username">Username</label>
          <input id="username" type="text" name="username" required autocomplete="username">
        </div>
        <div class="field full">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" required autocomplete="password">
        </div>
      </div>
      <div class="field button">
        <button class="primary">Sign in</button>
      </div>
    </form>
    <x-inc.footer />
    </div>
  </div>
</body>
</html>