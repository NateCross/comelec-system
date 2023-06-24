@extends('layouts.master')

@section('title', 'Add Candidate')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    @error('validation')
      @include('layouts.components.messages.error.error', [
        'message' => $message,
      ]);
    @enderror
    <div class="page__header">
      <div class="group">
        <span class="group__title">Add Candidate</span>
        <a href="{{ route('candidates.index') }}">
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
          action="{{ route('candidates.store') }}" 
          method="POST"
        >
          @csrf
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field full">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text"  name="student_id" required autocomplete="student_id" autofocus>
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="position">Position</label>
                <select name="position_id" id="position">
                  @foreach ($positions as $position)
                    <option 
                      value="{{ $position->id }}"
                    >
                      {{ $position->position_name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="field input">
                <label for="party_name">Party Name</label>
                <input id="party_name" type="text" name="party_name" autocomplete="party_name">
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

