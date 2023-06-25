@extends('layouts.master')

@section('title', 'My Profile')

@section('content')

@php($isAdmin = in_array(Auth::user()->role, ['s', 'a']))

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        @if ($isAdmin)
          <span class="group__title">Administrator's Account</span>
          <span class="group__description">Edit your profile and other COMELEC accounts.</span>
        @else
          <span class="group__title">My Account</span>
          <span class="group__description">Edit your profile.</span>
        @endif
      </div>
      <div class="tab">
        <a href="{{ route('account.profile') }}">
          <span class="selector active">My Profile</span>
        </a>
        @if ($isAdmin)
          <a href="{{ route('account.admin.index') }}">
            <span class="selector">Accounts</span>
          </a>
        @endif
      </div>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('account.update') }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">MY PROFILE</span>
          <span class="introduction">
            Hello, {{ Auth::user()->username }}!
          </span>
          <div class="fields">
            <div class="group">
              <div class="field input">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" name="student_id" required autocomplete="student_id" autofocus value="{{ Auth::user()->student_id }}">
              </div>
              <div class="field input">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required autocomplete="username" value="{{ Auth::user()->username }}">
              </div>
            </div>
            <div class="field button">
              <button class="primary wide" type="submit">Save Changes</button>
            </div>
          </div>
        </form>
      </div>
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('account.update') }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">CHANGE YOUR PASSWORD</span>
          <div class="fields">
            <div class="group">
              <div class="field input">
                <label for="password">New Password</label>
                <input id="password" type="password" name="password" required autocomplete="password">
              </div>
              <div class="field input">
                <label for="confirm_password">Re-enter Password</label>
                <input id="confirm_password" type="password" name="password_confirm" required autocomplete="confirm_password">
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
                <button class="primary wide" id="account-delete-btn" onclick="deleteAccount()">Delete Account</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deleteAccount() {
      axios.delete(
        route('account.destroy'),
      ).then(() => window.location.href = route('login'));
    }
  </script>

  <!-- JS Link -->
  {{-- <script src="js/accounts.js" type="text/javascript"></script> --}}

@endsection

