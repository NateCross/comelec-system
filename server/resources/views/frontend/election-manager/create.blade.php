@extends('layouts.master')

@section('title', 'Create Election')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Create Election Record</span>
        <a href="{{ route('election.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-arrow-left-long"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">Create an active election. Set the start date and end date of an election to set its election period.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('election.store') }}" 
          method="POST"
        >
          @csrf
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="field single">
              <label for="name">Election Record Name</label>
              <input id="name" type="text" name="name" required autocomplete="election_name" autofocus>
            </div>
            <div class="group">
              <div class="field">
                <label for="start_time">Election Start Date</label>
                <input id="start_time" type="datetime-local" name="start_time" required autocomplete="start_time">
              </div>
              <div class="field">
                <label for="end_time">Election End Date</label>
                <input id="end_time" type="datetime-local" name="end_time" required autocomplete="end_time">
              </div>
              <div class="field readonly">
                <label for="status">Status</label>
                <input id="status" type="text" name="status" required autocomplete="status" readonly value="Active">
              </div>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Create Election</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

