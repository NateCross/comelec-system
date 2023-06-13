@extends('layouts.master')

@section('title', 'Edit Student Account')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Edit Student Account</span>
        <a href="{{ route('student-accounts.index') }}">
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
          action="{{ route('student-accounts.update', $account->id) }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">ACCOUNT CREDENTIALS</span>
          <div class="fields">
            <div class="group">
              <div class="field">
                <label for="name">Name</label>
                <input id="name" type="text" name="full_name" required autocomplete="name" value="{{ $account->full_name }}" autofocus>
              </div>
              <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" autocomplete="password">
              </div>
            </div>
            <div class="field input single">
              <label for="student_id">Status</label>
              <select name="status">
                <option value="">Select Status</option>
                <option value="a">Active</option>
                <option value="i">Inactive</option>
              </select>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

