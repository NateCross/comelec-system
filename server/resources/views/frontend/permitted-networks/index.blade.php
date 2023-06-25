@extends('layouts.master')

@section('title', 'Permitted Networks')

@section('content')

  <div class="container">
    {{-- @include('layouts.components.messages.info.info'); --}}
    <div class="page__header">
      <div class="group">
        <span class="group__title">Network List</span>
      </div>
      <span class="description">Edit the list of networks students are allowed to connect to be able to vote.</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <div class="actions__btn">
            <a href="{{ route('networks.create') }}">
              <button class="primary">
                <i class="fa-regular fa-square-plus"></i>
                <span class="name">Add Network</span>
              </button>
            </a>
          </div>
          <form 
            class="search"
            action="{{ route('networks.search') }}"
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
              <th class="col5">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($networks as $network)
               <tr>
                  <td class="col1">{{ $network->name }}</td>
                  <td class="col2">{{ $network->id }}</td>
                  <td class="col5">
                    <a href="{{ route('networks.edit', $network->id) }}">
                      <button class="secondary">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                    <button 
                      class="secondary" 
                      id="delete-btn"
                      onclick="deleteNetwork({{ $network->id }})"
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

    {{ $networks?->links() }}

  </div>

  <script>
    function deleteNetwork(id) {
      axios.delete(
        route('networks.destroy', id),
      ).then(() => window.location.reload());
    }
  </script>

@endsection
