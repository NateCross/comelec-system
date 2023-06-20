@extends('layouts.master')

@section('title', 'Election Manager')

@section('content')

  <div class="container">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Election Records List</span>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          @unless (Auth::user()->role === 'c') 
            <div class="actions__btn">
              <a href="{{ route('election.create') }}">
                <button class="primary">
                  <i class="fa-solid fa-file-import"></i>
                  <span class="name">Create Record</span>
                </button>
              </a>
            </div>
          @endunless
          <select class="filter" name="status">
            <option value="0">Select Status</option>
            <option value="1">Archived</option>
            <option value="2">Final</option>
            <option value="2">Cancelled</option>
          </select>
          <form class="search" action="{{ route('election.search') }}">
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
              <th class="col1">Record Name</th>
              <th class="col2">ID</th>
              <th class="col3">Election Details</th>
              <th class="col4">Status</th>
              <th class="col4">Start Time</th>
              <th class="col5">End Time</th>
            </tr>
          </thead>
          <tbody class="wide">
              @foreach ($elections as $election)
                <tr
                  onclick="electionManager({{ $election->id }})"
                  style="cursor: pointer;"
                >
                  <td class="col1">{{ $election->name }}</td>
                  <td class="col2">{{ $election->id }}</td>
                  <td class="col3">{{ $election->description }}</td>
                  <td class="col4">{{
                    [
                      'a' => 'Active',
                      'c' => 'Canceled',
                      'f' => 'Final',
                      'r' => 'Archived',
                    ][$election->status]
                  }}</td>
                  <td class="col4">{{ $election->start_time }}</td>
                  <td class="col5">{{ $election->end_time }}</td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="pagination">
      {{-- {{ $elections->links() }} --}}

      {{-- <a href="#" class="group">
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
      </a> --}}

    </div>
  </div>

  <script>
    function electionManager(id) {
      window.location.href = route('election.candidates', id);
    }
  </script>

@endsection

