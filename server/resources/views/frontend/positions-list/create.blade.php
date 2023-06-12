@extends('layouts.master')

@section('title', 'Add Position')

@section('content')

  <div class="container short">
    @include('layouts.components.messages.info.info');
    <div class="page__header">
      <div class="group">
        <span class="group__title">Add Position</span>
        <a href="positions-list.php">
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
            <div class="group">
              <div class="field">
                <label for="position_name">Position Name</label>
                <input id="position_name" type="text" name="position_name" required autocomplete="position_name" autofocus>
              </div>
              <div class="field">
                <label for="num_candidates_elected">Number of Candidates to be Elected</label>
                <input id="num_candidates_elected" type="text" name="num_candidates_elected" required autocomplete="num_candidates_elected">
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="all_colleges">All Colleges</label>
                <input id="all_colleges" type="checkbox" name="all_colleges" required autocomplete="all_colleges">
              </div>
              <div class="field input">
                <label for="college">College</label>
                <input id="college" type="text" name="college" required autocomplete="college">
              </div>
            </div>
            <div class="field input">
              <label for="description">Description</label>
              <textarea id="description" type="text" name="description" required autocomplete="description"></textarea>
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

