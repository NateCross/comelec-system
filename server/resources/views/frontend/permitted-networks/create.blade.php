@extends('layouts.master')

@section('title', 'Create Permitted Network')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Add Network</span>
        <a href="{{ route('networks.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-arrow-left-long"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">Enter the name of the network that students can connect to to vote.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form 
          class="modify" 
          action="{{ route('networks.store') }}" 
          method="POST"
        >
          @csrf
          <span class="title">BASIC INFORMATION</span>
          <div class="fields">
            <div class="field single">
              <label for="name">Network Name</label>
              <input id="name" type="text" name="name" required autocomplete="network_name" autofocus>
            </div>
          </div>
          <div class="page__actions">
            <button type="submit" class="tertiary wide">Add Network</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

