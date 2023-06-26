@extends('layouts.master')

@section('title', 'Edit Position')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Edit Position</span>
        <a href="{{ route('positions.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-arrow-left-long"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">Edit a position. Set what college the position applies to and the number of winning candidates for that position.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('positions.update', $position->id) }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field">
                <label for="name">Position Name</label>
                <input id="name" type="text" class="form-control" name="position_name" required autocomplete="name" value="{{ $position->position_name }}" autofocus>
              </div>
              <div class="field">
                <label for="candidate_elect_num">Number of Candidates to be Elected</label>
                <input id="candidate_elect_num" type="text" class="form-control" name="num_of_elects" required autocomplete="candidate_elect_num" value="{{ $position->num_of_elects }}">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="all_colleges">All Colleges</label>
                <input 
                  id="all_colleges" 
                  type="checkbox" 
                  name="is_for_all" 
                  autocomplete="all_colleges"
                  @if ($position->is_for_all)
                    checked
                  @endif
                >
              </div>
              <div class="field input">
                <label for="college">College</label>
                <input id="college" type="text" name="college" autocomplete="college" value="{{ $position->college }}">
              </div>
            </div>
            <div class="field input">
              <label for="description">Description</label>
              <textarea id="description" type="text" name="description" autocomplete="description" value="{{ $position->description }}"></textarea>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Update Position</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

