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
            <button class="secondary">
              <i class="fa-solid fa-trash"></i>
              <span class="name">Delete All Candidates</span>
            </button>
          </div>
          <a href="archived-candidates.php">
            <button class="secondary">
              <i class="fa-solid fa-eye"></i>
              <span class="name">View Archived Candidates</span>
            </button>
          </a>
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
              <th class="col3">Party Name</th>
              <th class="col4">Position</th>
              <th class="col4">Date Created</th>
              <th class="col5">Actions</th>
            </tr>
          </thead>
          <tbody>
              <?php for ($i = 0; $i < 10; $i++) { ?>
                <tr>
                  <td class="col1">Name Placeholder</td>
                  <td class="col2">CS101</td>
                  <td class="col3">Party People</td>
                  <td class="col4">President</td>
                  <td class="col4">01/01/2001 12:00:00 AM</td>
                  <td class="col5">
                    <a href="candidates-list-edit.php">
                      <button class="secondary">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                    <button class="secondary" id="delete-btn">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php } ?>
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

  <!-- JS Link -->
  <script src="js/delete.js" type="text/javascript"></script>

@endsection

