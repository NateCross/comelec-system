@extends('layouts.master')

@section('title', 'Accounts')

@section('content')

  <div class="container short">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Administrator's Account</span>
        <span class="group__description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
      </div>
      <div class="tab">
        <a href="{{ route('account.profile') }}">
          <span class="selector">My Profile</span>
        </a>
        <a href="{{ route('account.admin.index') }}">
          <span class="selector active">Accounts</span>
        </a>
      </div>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <div class="actions__btn">
            <a href="{{ route('account.admin.create') }}">
              <button class="primary">
                <i class="fa-regular fa-square-plus"></i>
                <span class="name">Add Account</span>
              </button>
            </a>
          </div>
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
              <th class="col1">Name</th>
              <th class="col2">ID</th>
              <th class="col3">Password</th>
              <th class="col4">Role</th>
              <th class="col5">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td class="col1">{{ $user->username }}</td>
                <td class="col2">{{ $user->student_id }}</td>
                <td class="col3">###########################</td>
                <td class="col4">
                  {{
                    [
                      's' => 'Super Admin',
                      'a' => 'Admin',
                      'm' => 'Student Accounts Manager',
                      'c' => 'Commissioner',
                      'p' => 'Poll Worker',
                    ][$user->role]
                  }}
                </td>
                <td class="col5">
                  <a href="{{ route('account.admin.edit', $user->id) }}">
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
    <div class="pagination">
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
    </div>
  </div>

@endsection

