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
          <select class="filter" name="filter" onchange="filter(this.value)">
            <option 
              value=""
              @if (!request('filter'))
                selected
              @endif
            >
              Select Status
            </option>
            <option 
              value="r"
              @if (request('filter') == 'r')
                selected
              @endif
            >
              Archived
            </option>
            <option 
              value="f"
              @if (request('filter') == 'f')
                selected
              @endif
            >
              Final
            </option>
            <option 
              @if (request('filter') == 'c')
                selected
              @endif
              value="c"
            >
              Cancelled
            </option>
          </select>
          <form class="search" action="{{ route('election.search') }}">
            <div class="search__group">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" name="query" placeholder="Search...">
              <input 
                type="hidden" 
                name="filter"
                value="{{ request('filter') ?? '' }}"
              >
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

    {{ $elections?->links() }}
  </div>

  <script>
    function electionManager(id) {
      window.location.href = route('election.candidates', id);
    }

    function filter(value) {
      const urlParams = new URLSearchParams(window.location.search)?.get('query') ?? '';
      window.location.href = `
        /election/search?query=${urlParams}&filter=${value}
      `;
    }
  </script>

@endsection

