@extends('layouts.master')

@section('title', 'Add Student')

@section('content')

  <div class="container short">
    @error('validation')
      @include(
        'layouts.components.messages.error.error',
        [
          'message' => $message,
        ]
      );
    @enderror
    <div class="page__header">
      <div class="group">
        <span class="group__title">Add Student</span>
        <a href="{{ route('master-list.index') }}">
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
          action="{{ route('students.store')}}" 
          method="POST"
        >
          @csrf
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="field full">
              <label for="full_name">Full Name</label>
              <input id="full_name" type="text" name="full_name" required autocomplete="full_name" autofocus>
            </div>
            <div class="group">
              <div class="field input">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" name="student_id" required autocomplete="student_id">
              </div>
              <div class="field input">
                <label for="college">College</label>
                <input id="college" type="text" name="college" required autocomplete="college">
              </div>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Add Student</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

