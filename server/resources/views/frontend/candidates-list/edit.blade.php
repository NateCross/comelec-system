@extends('layouts.master')

@section('title', 'Edit Candidate')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Edit Candidate</span>
        <a href="candidates-list.php">
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
          action="{{ route('candidates.update', $candidate->id) }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field readonly">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text"  name="student_id" required autocomplete="student_id" readonly value="{{ $candidate->student->student_id }}">
              </div>
              <div class="field readonly">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required autocomplete="name" readonly value="{{ $candidate->student->full_name }}">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="position">Position</label>
                <select name="position_id" id="position">
                  @foreach ($positions as $position)
                    <option 
                      value="{{ $position->id }}"
                      selected="{{ $position->id === $candidate->position_id ? 1 : 0 }}"
                    >
                      {{ $position->position_name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="field input">
                <label for="party_name">Party Name</label>
                <input id="party_name" type="text" name="party_name" autocomplete="party_name" value="{{ $candidate->party_name }}">
              </div>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Update Candidate</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

