@extends('layouts.master')

@section('title', 'Add Candidate')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
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
        <form class="modify" action="" method="">
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="group">
              <div class="field">
                <label for="student_id">Student ID</label>
                <input id="student_id" type="text"  name="student_id" required autocomplete="student_id" autofocus>
              </div>
              <div class="field readonly">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required autocomplete="name" readonly>
              </div>
            </div>
            <div class="group">
              <div class="field input">
                <label for="position">Position</label>
                <select name="position">
                  <option value="0">Select Position</option>
                  <option value="1">President</option>
                  <option value="2">Vice President</option>
                  <option value="3">Secretary</option>
                  <option value="4">Treasurer</option>
                  <option value="5">Auditor</option>
                  <option value="6">PRO</option>
                </select>
              </div>
              <div class="field input">
                <label for="party_name">Party Name</label>
                <input id="party_name" type="text" name="party_name" required autocomplete="party_name">
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

