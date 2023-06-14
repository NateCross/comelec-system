@extends('layouts.master')

@section('title', 'Election Voters')

@section('content')

  <div class="container wide">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Election Manager</span>
        <span class="group__description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
      </div>
      <div class="tab">
        <a href="{{ route('election.candidates', $election->id) }}">
          <span class="selector">Candidates</span>
        </a>
        <a href="{{ route('election.voters', $election->id) }}">
          <span class="selector active">Voters</span>
        </a>
      </div>
    </div>
    <div class="content group">
      <div class="content__row">
        <div class="actions spaced">
          <span class="title">Voters</span>
          <form class="search"
            class="search"
            action="{{ route('election.voters.search', $election->id) }}"
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
              <th class="col1">Voter Name</th>
              <th class="col2">ID</th>
              <th class="col3">Vote Timestamp</th>
              <th class="col4">Access Code Generate Timestamp</th>
              <th class="col5">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($election->validStudents as $student)
              <tr>
                <td class="col1">{{ $student->full_name }}</td>
                <td class="col2">{{ $student->student_id }}</td>
                <td class="col3">{{ $student->pivot->vote_timestamp }}</td>
                <td class="col4">{{ $student->pivot->ac_view_timestamp }}</td>
                <td class="col5">
                  <button 
                    class="secondary" 
                    id="delete-btn"
                    onclick="invalidate({{ $student->pivot->id }}, {{ $student->pivot->is_invalid }})"
                  >
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="content__details">
       <div class="header-details">
        <div class="group">
         <span class="title">ELECTION RECORD</span>
        </div>
       </div>
       <div class="election-details">
        <span class="title">DETAILS</span>
        <div class="group">
         <span class="name">Election Start Time</span>
         <span class="value">{{ $election->start_time }}</span>
        </div>
        <div class="group">
         <span class="name">Election End Time</span>
         <span class="value">{{ $election->end_time }}</span>
        </div>
        <div class="group">
         <span class="name">Election Record Name</span>
         <span class="value">{{ $election->name }}</span>
        </div>
        <div class="group">
         <span class="name">Description</span>
         <span class="value">{{ $election->description }}</span>
        </div>
        <div class="group">
         <span class="name">Status</span>
         <span class="value">
          {{
            [
              'a' => 'Active',
              'c' => 'Canceled',
              'f' => 'Final',
              'r' => 'Archived',
            ][$election->status]
          }}
         </span>
        </div>
       </div>
       <div class="actions">

        @if(!in_array($election->status, ['c', 'r']))
          @if($election->status != 'f')
            <button 
              class="primary"
              onclick="finalize()"
            >
              Finalize Record
            </button>
          @endif
          <button 
            class="secondary"
            onclick="archive()"
          >
            Archive Record
          </button>
          <button 
            class="secondary"
            onclick="cancel()"
          >
            Cancel Record
          </button>
        @endif
       </div>
      </div>
    </div>
  </div>

  <script>
    function finalize() {
      axios.patch(
        route('election.update', {{ $election->id }}),
        {
          'status': 'f'
        },
      ).then(() => window.location.reload())
    }

    function archive() {
      axios.patch(
        route('election.update', {{ $election->id }}),
        {
          'status': 'r'
        },
      ).then(() => window.location.reload())
    }

    function cancel() {
      axios.patch(
        route('election.update', {{ $election->id }}),
        {
          'status': 'c'
        },
      ).then(() => window.location.reload())
    }

    function invalidate(id, isInvalid) {
      axios.patch(
        route('record-student.update', id),
        {
          'is_invalid': !isInvalid,
        },
      ).then(() => window.location.reload());
    }
  </script>


@endsection

