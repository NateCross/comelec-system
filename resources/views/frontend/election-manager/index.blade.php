@extends('layouts.master')

@section('title', 'Election Manager')

@section('content')

  <div class="container">
    @include('layouts.components.messages.info.info');
    <div class="page__header">
      <div class="group">
        <span class="group__title">Election Records List</span>
      </div>
      <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="content">
      <div class="content__row">
        <div class="actions">
          <div class="actions__btn">
            <a href="election-manager-create.php">
              <button class="primary">
                <i class="fa-solid fa-file-import"></i>
                <span class="name">Create Record</span>
              </button>
            </a>
          </div>
          <select class="filter" name="status">
            <option value="0">Select Status</option>
            <option value="1">Archived</option>
            <option value="2">Final</option>
            <option value="2">Cancelled</option>
          </select>
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
              <th class="col1">Record Name</th>
              <th class="col2">ID</th>
              <th class="col3">Election Details</th>
              <th class="col4">Status</th>
              <th class="col4">Start Time</th>
              <th class="col5">End Time</th>
            </tr>
          </thead>
          <tbody class="wide">
              <?php for ($i = 0; $i < 10; $i++) { ?>
                <tr>
                  <td class="col1">Name Placeholder</td>
                  <td class="col2">RR101</td>
                  <td class="col3">Ut lorem libero, interdum sed faucibus sed, pretium sed felis.</td>
                  <td class="col4">Archived</td>
                  <td class="col4">1/01/2001 12:00:00 AM</td>
                  <td class="col5">1/01/2001 12:00:00 AM</td>
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

@endsection

