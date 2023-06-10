@extends('layouts.master')

@section('title', 'Create Election')

@section('content')

  <div class="container short">
    @include('layouts.components.messages.info.info');
    <div class="page__header">
      <div class="group">
        <span class="group__title">Create Election Record</span>
        <a href="election-manager.php">
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
        <form class="modify" action="" method="">
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="field single">
              <label for="election_name">Election Record Name</label>
              <input id="election_name" type="text" name="election_name" required autocomplete="election_name" autofocus>
            </div>
            <div class="group">
              <div class="field">
                <label for="start_date">Election Start Date</label>
                <input id="start_date" type="date" name="start_date" required autocomplete="start_date">
              </div>
              <div class="field">
                <label for="end_date">Election End Date</label>
                <input id="end_date" type="date" name="end_date" required autocomplete="end_date">
              </div>
              <div class="field readonly">
                <label for="status">Status</label>
                <input id="status" type="text" name="status" required autocomplete="status" readonly>
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

