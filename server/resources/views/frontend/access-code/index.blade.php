@extends('layouts.master')

@section('title', 'Access Code Generator')

@section('content')

  <div class="container code short">
    <div class="top">
      {{-- @include('layouts.components.messages.info.info'); --}}
    </div>
    <div class="bottom">
      <form 
        action="{{ route('access-code.code') }}" 
        method="POST" 
        class="modify access"
      >
        @csrf
        <img src="{{ Vite::asset('resources/assets/images/mobile_encryption.svg') }}" alt="Mobile Encryption">
        <span class="title">Access Code Generator</span>
        <div class="fields">
          <div class="field full">
            <label for="user_name">Student ID</label>
            <input id="user_name" type="text" name="student_id" required autocomplete="username" placeholder="e.g., 2932778" autofocus>
          </div>
          <div class="field full">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="password">
          </div>
          <div class="field button">
            <button type="submit" class="primary">Generate Code</button>
          </div>
        </div>
      </form>
      <div class="card">
        <span class="description">Here's your generated code:</span>
        <div class="qr-code">
          @if(isset($qr))
            {!! $qr !!}
          @endif
        </div>
        <div class="output-code">
          <input class="item" readonly @if(isset($code)) value={{ $code[0] }} @endif>
          <input class="item" readonly @if(isset($code)) value={{ $code[1] }} @endif>
          <input class="item" readonly @if(isset($code)) value={{ $code[2] }} @endif>
          <input class="item" readonly @if(isset($code)) value={{ $code[3] }} @endif>
          <input class="item" readonly @if(isset($code)) value={{ $code[4] }} @endif>
          <input class="item" readonly @if(isset($code)) value={{ $code[5] }} @endif>
        </div>
        <div class="actions">
          <button 
            class="primary"
            onclick="clearCode()"
          >
            <i class="fa-solid fa-text-slash"></i>
            <span class="name">Clear Code</span>
          </button>
        </div>
      </div>

    </div>
  </div>

  <script>
    function clearCode() {
      window.location.href = route('access-code.index');
    }
  </script>

@endsection

