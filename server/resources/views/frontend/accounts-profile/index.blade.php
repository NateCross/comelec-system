@extends('layouts.master')

@section('title', 'My Profile')

@section('content')

  <div class="container short">
    @include('layouts.components.messages.info.info');
    <div class="page__header">
      <div class="group">
        <span class="group__title">Administrator's Account</span>
        <span class="group__description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
      </div>
      <div class="tab">
        <a href="accounts-profile.php">
          <span class="selector active">My Profile</span>
        </a>
        <a href="accounts-admin.php">
          <span class="selector">Accounts</span>
        </a>
      </div>
    </div>
    <div class="content">
      <div class="content__row">
        <form class="modify" action="" method="">
          <span class="title">MY PROFILE</span>
          <span class="introduction">Hello, John Doe!</span>
          <div class="fields">
            <div class="group">
              <div class="field input">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" name="student_id" required autocomplete="student_id" autofocus>
              </div>
              <div class="field input">
                <label for="username">Name</label>
                <input id="username" type="text" name="username" required autocomplete="username">
              </div>
            </div>
            <div class="field button">
              <button class="primary wide" type="submit">Save Changes</button>
            </div>
          </div>
        </form>
      </div>
      <div class="content__row">
        <form class="modify" action="" method="">
          <span class="title">CHANGE YOUR PASSWORD</span>
          <div class="fields">
            <div class="group">
              <div class="field input">
                <label for="password">New Password</label>
                <input id="password" type="password" name="password" required autocomplete="password">
              </div>
              <div class="field input">
                <label for="confirm_password">Re-enter Password</label>
                <input id="confirm_password" type="password" name="confirm_password" required autocomplete="confirm_password">
              </div>
            </div>
            <div class="field button">
              <button class="primary wide" type="submit">Confirm</button>
            </div>
          </div>
        </form>
      </div>
      <div class="content__row">
        <div class="settings">
          <span class="title">SETTINGS</span>
            <div class="group">
              <span class="name">Would you like to delete your account?</span>
              <div class="actions">
                <button class="primary wide" id="account-delete-btn">Delete Account</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS Link -->
  <script src="js/accounts.js" type="text/javascript"></script>

@endsection

