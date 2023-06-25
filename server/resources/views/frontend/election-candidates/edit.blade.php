@extends('layouts.master')

@section('title', 'Override Candidate')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Override Candidate Result</span>
        <a href="{{ route('election.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-arrow-left-long"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">Change the result for this candidate. Give a reason for overriding the results.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('record-candidate.update', $record_candidate->id) }}" 
          method="POST"
        >
          @csrf
          @method('PUT')
          <span class="title">OVERRIDE DETAILS</span>
          <div class="fields">
            <div class="field input">
              <label for="reason">Reason</label>
              <textarea id="reason" type="text" name="reason" autocomplete="reason" autofocus>{{ $record_candidate->reason }}</textarea>
            </div>
            <div class="field">
              <legend>Result</legend>
              <div class="radio">
                <div>
                  <label for="result_win">Win</label>
                  <input 
                    type="radio" 
                    name="is_elected" 
                    id="result_win" 
                    value="1"
                    @if ($record_candidate->is_elected)
                      checked
                    @endif
                  >
                </div>
                <div>
                  <label for="result_lose">Loss</label>
                  <input 
                    type="radio" 
                    name="is_elected" 
                    id="result_lose" 
                    value="0"
                    @if (!$record_candidate->is_elected)
                      checked
                    @endif
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Override Result</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

