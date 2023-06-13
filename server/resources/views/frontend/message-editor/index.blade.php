@extends('layouts.master')

@section('title', 'Student Master List')

@section('content')

{{-- {{ dd($messages->find('candidate_win')) }} --}}

  <div class="container">
    @include('layouts.components.messages.info.info');
    <div class="page__header wide">
      <div class="group">
        <span class="group__title">Message Editor</span>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <form 
        class="modify" 
        action="{{ route('message-editor.update') }}" 
        method="POST"
      >
        @csrf
        <div class="content__row short darken">
          <div class="details">
            <span class="title">PAGE INFORMATION</span>
            <span class="description">These are messages that appear to be logged in users that cannot use the application to vote. It appears after logging in.</span>
          </div>
          <div class="fields">
            <div class="field full">
              <label for="unverified_account">Unverified Account</label>
              {{-- <input id="unverified_account" type="text" name="unverified_account" required autocomplete="unverified_account" value="{{ $messages->find('unverified_account')->value }}"> --}}
            </div>
            <div class="field full">
              <label for="inactive">Inactive Account</label>
              {{-- <input id="inactive" type="text" name="inactive_account" required autocomplete="inactive" value="{{ $messages->find('inactive_account')->value }}"> --}}
            </div>
          </div>
        </div>
        <div class="content__row short darken">
          <div class="details">
            <span class="title">Register / Log In Page</span>
            <span class="description">These are messages that appear in Register and Log In pages when an error occurs.</span>
          </div>
          <div class="fields">
            <div class="field full">
              <label for="id_not_exist">Non-existent Student ID inputted</label>
              <input id="id_not_exist" type="text" name="no_student_id" required autocomplete="id_not_exist" value="{{ $messages->find('no_student_id')->value }}">
            </div>
            <div class="field full">
              <label for="id_exist">Student ID exists but belongs to another account during register</label>
              <input id="id_exist" type="text" name="student_id_exists" required autocomplete="id_exist" value="Student ID belongs to another account. Contact COMELEC if there is an issue.">
            </div>
            <div class="field full">
              <label for="password_match">Unmatched Student ID and Password. Student ID exists.</label>
              <input id="password_match" type="text" name="student_wrong_password" required autocomplete="password_match" value="Wrong password. Contact COMELEC if there is an issue.">
            </div>
          </div>
        </div>
        <div class="content__row short darken">
          <div class="details">
            <span class="title">Voting Page</span>
            <span class="description">These are messages shown in the voting page.</span>
          </div>
          <div class="fields">
            <div class="field full">
              <label for="end_voting">End of voting</label>
              <input id="end_voting" type="text" name="end_of_voting" required autocomplete="end_voting" value="Thank you for voting with us!">
            </div>
            <div class="field full">
              <label for="voting_before_election">Before election period</label>
              <input id="voting_before_election" type="text" name="before_election_period" required autocomplete="voting_before_election" value="The election period has not started.">
            </div>
            <div class="field full">
              <label for="voting_after_election">After election period. Election is not yet archived</label>
              <input id="voting_after_election" type="text" name="after_election_period" required autocomplete="voting_after_election" value="Election has ended. See results on the Results page">
            </div>
            <div class="field full">
              <label for="voting_no_election">No active election</label>
              <input id="voting_no_election" type="text" name="voting_no_election" required autocomplete="voting_no_election" value="There is no incoming election yet.">
            </div>
            <div class="field full">
              <label for="voting_inactive_account">Inactive account</label>
              <input id="voting_inactive_account" type="text" name="voting_inactive_account" required autocomplete="voting_inactive_account" value="Your account is inactive. Contact COMELEC for further details.">
            </div>
          </div>
        </div>
        <div class="content__row short darken">
          <div class="details">
            <span class="title">Results Page</span>
            <span class="description">These are messages shown in the results page.</span>
          </div>
          <div class="fields">
            <div class="field full">
              <label for="results_before_election">Before election period</label>
              <input id="results_before_election" type="text" name="results_before_election" required autocomplete="results_before_election" value="The election period has not started.">
            </div>
            <div class="field full">
              <label for="results_during_election">During election period</label>
              <input id="results_during_election" type="text" name="results_during_election" required autocomplete="results_during_election" value="Results will show after the election period. Vote through Voting page.">
            </div>
            <div class="field full">
                <label for="results_no_election">No active election</label>
                <input id="results_no_election" type="text" name="results_no_election" required autocomplete="results_no_election" value="There is no incoming election yet.">
            </div>
          </div>
        </div>
        <div class="content__row short darken">
          <div class="details">
            <span class="title">Defaults</span>
            <span class="description">These are default values assigned to details on records when no value is set.</span>
          </div>
          <div class="fields">
            <div class="field full">
              <label for="default_win">Default candidate win reason</label>
              <input id="default_win" type="text" name="default_candidate_win" required autocomplete="default_win" value="Win by majority.">
            </div>
            <div class="field full">
              <label for="default_party_name">Default candidate party name</label>
              <input id="default_party_name" type="text" name="default_candidate_party" required autocomplete="default_party_name" value="Independent party">
            </div>
          </div>
        </div>
        <div class="page__actions">
          <button type="submit" class="tertiary wide">Save Changes</button>
        </div>
      </form>
    </div>
    </div>
  </div>

@endsection

