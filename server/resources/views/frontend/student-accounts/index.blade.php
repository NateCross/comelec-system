@extends('layouts.master')

@section('title', 'Student Accounts List')

@section('content')

  <div class="container">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Student Accounts List</span>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <select class="filter" name="status">
            <option value="0">Select Status</option>
            <option value="1">Not Verified</option>
            <option value="2">Verified</option>
          </select>
          <form 
            class="search"
            action="{{ route('student-accounts.search') }}"
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
              <th class="col4">Status</th>
              <th class="col5">Date Created</th>
              <th class="col6">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($accounts as $account)
              <tr>
                <td class="col1">
                  {{ $account->full_name }}
                </td>
                <td class="col2">
                  {{ $account->student_id }}
                </td>
                <td class="col4">
                  {{
                    [
                      'v' => 'Awaiting Verification',
                      'a' => 'Active',
                      'i' => 'Inactive',
                    ][$account->status]
                  }}
                </td>
                <td class="col4">
                  {{ $account->created_at }}
                </td>
                <td class="col5 flex-end">
                  @unless ($account->status === 'a')
                    <button 
                      class="secondary" 
                      id="verify-btn"
                      onclick="verify({{ $account->id }})"
                    >
                      <i class="fa-solid fa-check"></i>
                    </button>
                  @endunless
                  <a href="{{ route('student-accounts.edit', $account->id) }}">
                    <button class="secondary">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </a>
                  <button 
                    class="secondary" 
                    id="delete-btn"
                    onclick="deleteAccount({{ $account->id }})"
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
    function verify(id) {
      axios.post(
        route('student-accounts.verify', id)
      ).then(() => window.location.reload());
    }

    function deleteAccount(id) {
      axios.delete(
        route('student-accounts.destroy', id)
      ).then(() => window.location.reload());
    }
  </script>
  <!-- JS Link -->
  {{-- <script src="js/delete.js" type="text/javascript"></script>
  <script src="js/verify.js" type="text/javascript"></script> --}}

@endsection

