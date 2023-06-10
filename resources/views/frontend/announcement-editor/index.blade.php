@extends('layouts.master')

@section('title', 'Announcement Editor')

@section('content')

  <div class="container short">
    @include('layouts.components.messages.info.info');
    <div class="page__header">
      <div class="group">
        <span class="group__title">Announcement Editor</span>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <div class="content__row">
        <form class="modify" action="" method="">
          <span class="title">PAGE INFORMATION</span>
          <div class="fields">
            <div class="field full">
              <label for="article">Embedded Article</label>
              <textarea id="article" type="text" name="article" required autocomplete="article"></textarea> 
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="page__actions">
      <button type="submit" class="primary wide">Update Announcement</button>
    </div>
  </div>

@endsection

