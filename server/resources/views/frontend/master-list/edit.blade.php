@extends('layouts.master')

@section('title', 'Edit Student')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Edit Student</span>
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
          action="{{ route('student.update', $student->student_id) }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field name">
                <label for="first_name">First Name</label>
                <input id="first_name" type="text" name="first_name" required autocomplete="first_name" autofocus>
              </div>
              <div class="field name">
                <label for="last_name">Last Name</label>
                <input id="last_name" type="text" name="last_name" required autocomplete="last_name">
              </div>
              <div class="field name">
                <label for="middle_initial">M.I.</label>
                <input id="middle_initial" type="text" name="middle_initial" required autocomplete="middle_initial">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" name="student_id" required autocomplete="student_id">
              </div>
              <div class="field input">
                <label for="college">College</label>
                <input id="college" type="text" name="college" required autocomplete="college" value="{{ $student->college }}">
              </div>
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

