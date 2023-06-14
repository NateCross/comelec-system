@extends('layouts.master')

@section('title', 'Election Candidates')

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
          <span class="selector active">Candidates</span>
        </a>
        <a href="{{ route('election.voters', $election->id) }}">
          <span class="selector">Voters</span>
        </a>
      </div>
    </div>
    <div class="content group">
      <div class="content__row">
        <div class="actions spaced">
         <span class="title">Candidates</span>
          <form class="search">
            <div class="search__group">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" placeholder="Search...">
            </div>
            <i class="fa-solid fa-xmark search__exit"></i>
          </form>
        </div>
        <table>
          <thead>
            <tr>
              <th class="col1">Candidate Name</th>
              <th class="col2">Votes</th>
              <th class="col3">Student ID</th>
              <th class="col4">Result</th>
              <th class="col5">Reason</th>
              <th class="col6">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($election->candidates as $candidate)
              <tr>
                <td class="col1">{{ $candidate->student->full_name }}</td>
                <td class="col2">
                  {{ $candidate->pivot->num_of_votes }}
                </td>
                <td class="col3">
                  {{ $candidate->student_id }}
                </td>
                <td class="col4">
                  {{-- <button
                    onclick="toggleElected({{$candidate->pivot->id}}, {{$candidate->pivot->is_elected}})"
                    class="primary"
                  > --}}
                    {{ $candidate->pivot->is_elected ? 'Win' : 'Loss'}}
                  {{-- </button> --}}
                </td>
                <td class="col5">
                  {{ $candidate->pivot->reason }}
                </td>
                <td class="col6">
                  @if($election->status === 'a')
                    <a href="{{ route('election.candidates.edit', ['election_record' => $election->id, 'candidate' => $candidate->id]) }}">
                      <button class="secondary">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                  @endif
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

    function toggleElected(pivotId, isElected) {
      axios.patch(
        route('record-candidate.update', pivotId),
        {
          'is_elected': !isElected,
        },
      ).then(() => window.location.reload())
    }
  </script>

@endsection

