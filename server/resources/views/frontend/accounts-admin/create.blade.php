@extends('layouts.master')

@section('title', 'Add Account')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Add Account</span>
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
          action="{{ route('account.admin.store') }}" 
          method="POST"
        >
          @csrf
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field input">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" name="student_id" required autocomplete="student_id" autofocus>
              </div>
              <div class="field input">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="password">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required autocomplete="username">
              </div>
              <div class="field short">
                <label for="user_role">User Role</label>
                <select name="role" id="user_role">
                  <option value="0">Select Role</option>
                  <option value="s">Super Admin</option>
                  <option value="a">Admin</option>
                  <option value="m">Student Accounts Manager</option>
                  <option value="c">Commissioner</option>
                  <option value="p">Poll Workers</option>
                </select>
              </div>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Add Account</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
