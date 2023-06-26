@extends('layouts.master')

@section('title', 'Edit Student')

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
        <span class="group__title">Edit Student</span>
        <a href="{{ route('master-list.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-arrow-left-long"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">Edit a student information. Set the student to be enrolled or unenrolled.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('students.update', $student->student_id) }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="field full">
              <label for="full_name">Full Name</label>
              <input id="full_name" type="text" name="full_name" required autocomplete="full_name" value="{{ $student->full_name }}">
            </div>
            <div class="group">
              <div class="field input">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text" name="student_id" required autocomplete="student_id" readonly value="{{ $student->student_id }}">
              </div>
              <div class="field input">
                <label for="college">College</label>
                <input id="college" type="text" name="college" required autocomplete="college" value="{{ $student->college }}">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="status">Enrolled</label>
                <input 
                  id="status" 
                  type="checkbox" 
                  name="is_enrolled" 
                  autocomplete="enrolled"
                  @if ($student->is_enrolled)
                    checked
                  @endif
                >
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

