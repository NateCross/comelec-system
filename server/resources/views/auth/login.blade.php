<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS Link -->
    @vite('resources/scss/styles.scss')
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login">
        <div class="logo">
            <span>NORSU SG COMELEC</span>
            <span>GUIHILNGAN CAMPUS</span>
        </div>
        <div class="logo-pic">
            <img src="{{ asset('images/comelec_logo.png') }}">
        </div>
        @error('username')
            @include('layouts.components.messages.short.short')
        @enderror
        <form action="/user/login" method="POST" class="modify hero">
            @csrf
            <div class="login-details">
                <span class="title">Sign in</span>
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
        <div class="inquiry">
            <div class="description">For further questions or inquries, <br> please contact <a href=""
                    class="contact">COMELEC.</a> </div>
        </div>
    </div>

</body>

</html>
