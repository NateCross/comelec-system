@extends('layouts.master')

@section('title', 'Archived Candidates List')

@section('content')

  <div class="container">
    <div class="page__header">
      <div class="group">
        <span class="group__title">Archived Candidates List</span>
        <a href="{{ route('candidates.index') }}">
          <button class="primary bold">
            <i class="fa-solid fa-angle-left"></i>
            Go Back
          </button>
        </a>
      </div>
      <span class="description">View previously finished election records.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <form 
            class="search"
            action="{{ route('candidates.search-archive') }}"
          >
            <div class="search__group">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" name="query" placeholder="Search...">
            </div>
            <i class="fa-solid fa-xmark search__exit"></i>
          </form>
        </div>
        <table>
          <thead>
            <tr>
              <th class="col1">Name</th>
              <th class="col2">ID</th>
              <th class="col3">Party Name</th>
              <th class="col4">Position</th>
              <th class="col4">Date Created</th>
              <th class="col5">Election Involved</th>
            </tr>
          </thead>
          <tbody class="wide">
            @foreach ($candidates as $candidate)
              <tr>
                <td class="col1">
                  {{ $candidate->student->full_name }}
                </td>
                <td class="col2">
                  {{ $candidate->student->student_id }}
                </td>
                <td class="col3">
                  {{ $candidate->party_name }}
                </td>
                <td class="col4">
                  {{ $candidate->position->position_name }}
                </td>
                <td class="col4">
                  {{ $candidate->created_at }}
                </td>
                <td class="col4">
                  {{ 
                    count($candidate->records)
                    ? $candidate->records[0]->name
                    : null
                  }}
                </td>
              </tr>
            @endforeach
            </form>
          </tbody>
        </table>
      </div>
    </div>

    {{ $candidates?->links() }}

  </div>

@endsection

