@extends('layouts.master')

@section('title', 'Announcement Editor')

@section('content')

    <div class="container short">
        {{-- @include('layouts.components.messages.info.info'); --}}
        <div class="page__header">
            <div class="group">
                <span class="group__title">Announcement Editor</span>
            </div>
            <span class="description">Edit the announcement page in the mobile application. Enter your desired announcement on the embedded article field.</span>
        </div>
        <div class="content">
            <div class="content__row">
                <form 
                    class="modify" 
                    action="{{ route('announcements.update', 1) }}" 
                    method="POST"
                >
                    @csrf
                    @method('PUT')
                    <span class="title">PAGE INFORMATION</span>
                    <div class="fields">
                        <div class="field full">
                            <label for="article">Embedded Article</label>
                            <textarea id="article" type="text" name="text" required autocomplete="article">{{ $announcement->text }}</textarea>
                        </div>
                    </div>
                    <div class="page__actions">
                        <button type="submit" class="tertiary wide">Update Announcement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
