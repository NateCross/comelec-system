<div class="container code short">
  <div class="top">
    @include('views/components/messages/info/info.php')
  </div>
  <div class="bottom">
    <form action="" method="" class="modify access">
      <img src="assets/images/mobile_encryption.svg" alt="Mobile Encryption">
      <span class="title">Access Code Generator</span>
      <div class="fields">
        <div class="field full">
          <label for="user_name">Username</label>
          <input id="user_name" type="text" name="user_name" required autocomplete="username" placeholder="e.g., 2932778" autofocus>
        </div>
        <div class="field full">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" required autocomplete="password">
        </div>
        <div class="field button">
          <button type="submit" class="primary">Generate Code</button>
        </div>
      </div>
    </form>
    <div class="card">
      <span class="description">Here's your generated code:</span>
      <div class="qr-code">[qr code here]</div>
      <div class="output-code">
        <input class="item"></input>
        <input class="item"></input>
        <input class="item"></input>
        <input class="item"></input>
        <input class="item"></input>
        <input class="item"></input>
      </div>
      <div class="actions">
        <button class="primary">
          <i class="fa-solid fa-text-slash"></i>
          <span class="name">Clear Code</span>
        </button>
      </div>
    </div>

  </div>
</div>
