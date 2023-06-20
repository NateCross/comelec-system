@extends('layouts.master')

@section('title', 'Candidates List')

@section('content')

  <div class="container">
    <div class="page__header">
      <div class="group">
        <span class="group__title">Candidates List</span>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <div class="actions__btn">
            <a href="{{ route('candidates.create') }}">
              <button class="primary">
                <i class="fa-regular fa-square-plus"></i>
                <span class="name">Add Candidate</span>
              </button>
            </a>
            <button 
              class="secondary"
              onclick="deleteAll()"
            >
              <i class="fa-solid fa-trash"></i>
              <span class="name">Delete All Candidates</span>
            </button>
          </div>
          <a href="{{ route('candidates.archive') }}">
            <button class="secondary">
              <i class="fa-solid fa-eye"></i>
              <span class="name">View Archived Candidates</span>
            </button>
          </a>
          <form 
            class="search"
            action="{{ route('candidates.search') }}"
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
              <th class="col5">Actions</th>
            </tr>
          </thead>
          <tbody>
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
                <td class="col5">
                  <a href="{{ route('candidates.edit', $candidate->id) }}">
                    <button class="secondary">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </a>
                  <button 
                    class="secondary" 
                    id="delete-btn"
                    onclick="deleteCandidate({{ $candidate->id }})"
                  >
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    {{-- <div class="pagination">
      <a href="#" class="group">
        <i class="fa-solid fa-angle-left"></i>
        <span class="name">PREVIOUS</span>
      </a>
      <a href="#">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <span class="ellipsis">...</span>
      <a href="#">101</a>
      <a href="#" class="group">
        <span class="name">NEXT</span>
        <i class="fa-solid fa-angle-right"></i>
      </a>
    </div> --}}
  </div>

  <script>
    function deleteCandidate(id) {
      axios.delete(
        route('candidates.destroy', id)
      ).then(() => window.location.reload());
    }

    function deleteAll() {
      axios.post(
        route('candidates.destroy-all')
      ).then(() => window.location.reload());
    }
  </script>
@endsection

