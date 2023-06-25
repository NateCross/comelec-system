@extends('layouts.master')

@section('title', 'Add Position')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Add Position</span>
        <a href="{{ route('positions.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-arrow-left-long"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">Add a position. Set what college the position applies to and the number of winning candidates for that position.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('positions.store') }}" 
          method="POST"
        >
          @csrf
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field">
                <label for="position_name">Position Name</label>
                <input id="position_name" type="text" name="position_name" required autocomplete="position_name" autofocus>
              </div>
              <div class="field">
                <label for="num_candidates_elected">Number of Candidates to be Elected</label>
                <input id="num_candidates_elected" type="text" name="num_of_elects" required autocomplete="num_candidates_elected">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="all_colleges">All Colleges</label>
                <input id="all_colleges" type="checkbox" name="is_for_all" autocomplete="all_colleges">
              </div>
              <div class="field input">
                <label for="college">College</label>
                <input id="college" type="text" name="college" autocomplete="college">
              </div>
            </div>
            <div class="field input">
              <label for="description">Description</label>
              <textarea id="description" type="text" name="description" autocomplete="description"></textarea>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Add Position</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

