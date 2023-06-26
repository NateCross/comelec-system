@extends('layouts.master')

@section('title', 'Positions List')

@section('content')

  <div class="container">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Positions List</span>
      </div>
      <span class="description">Edit the officer positions of the Student Government.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <div class="actions__btn">
            <a href="{{ route('positions.create') }}">
              <button class="primary">
                <i class="fa-regular fa-square-plus"></i>
                <span class="name">Add Position</span>
              </button>
            </a>
          </div>
          <form 
            class="search"
            action="{{ route('positions.search') }}"
          >
            <div class="search__group">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" name="query" placeholder="Search...">
            </div>
            <i class="fa-solid fa-xmark search__exit"></i>
          </form>
        </div>
        <table class="position">
          <thead>
            <tr>
              <th class="col1">Position Name</th>
              <th class="col2">ID</th>
              <th class="col3">Description</th>
              <th class="col4">Colleges</th>
              <th class="col5">Number of Candidates to be Elected</th>
              <th class="col6">Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($positions as $position)
                <tr>
                  <td class="col1">{{ $position->position_name }}</td>
                  <td class="col2">{{ $position->id }}</td>
                  <td class="col3">{{ $position->description }}</td>
                  <td class="col4">
                    {{
                      $position->is_for_all 
                      ? 'All Colleges'
                      : $position->college
                    }}
                  </td>
                  <td class="col5">{{ $position->num_of_elects }}</td>
                  <td class="col6">
                    <a href="{{ route('positions.edit', $position->id) }}">
                      <button class="secondary">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{ $positions?->links() }}

  </div>

@endsection

