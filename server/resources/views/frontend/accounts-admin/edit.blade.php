@extends('layouts.master')

@section('title', 'Edit Account')

@section('content')

  <div class="container short">
    @error('validation')
      @include('layouts.components.messages.error.error', [
        'message' => $message,
      ]);
    @enderror
    <div class="page__header">
      <div class="group">
        <span class="group__title">Edit Account</span>
        <a href="{{ route('account.admin.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-arrow-left-long"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('account.admin.update', $user->id) }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field input">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" name="student_id" required autocomplete="student_id" autofocus value="{{ $user->student_id }}">
              </div>
              <div class="field input">
                <label for="password">New Password</label>
                <input id="password" type="text" name="password" autocomplete="password">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required autocomplete="username" value="{{ $user->username }}">
              </div>
              <div class="field short">
                <label for="user_role">User Role</label>
                <select name="role" id="user_role">
                  <option value="">Select Role</option>
                  <option value="s" @selected($user->role === 's')>Super Admin</option>
                  <option value="a" @selected($user->role === 'a')>Admin</option>
                  <option value="m" @selected($user->role === 'm')>Student Accounts Manager</option>
                  <option value="c" @selected($user->role === 'c')>Commissioner</option>
                  <option value="p" @selected($user->role === 'p')>Poll Workers</option>
                </select>
              </div>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Edit Account</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

