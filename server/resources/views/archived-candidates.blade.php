<div class="container">
  <div class="page__header">
    <div class="group">
      <span class="group__title">Archived Candidates List</span>
      <a href="candidates-list.php">
        <button class="primary bold">
          <i class="fa-solid fa-angle-left"></i>
          Go Back
        </button>
      </a>
    </div>
    <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
  </div>
  <div class="content">
    <div class="content__row">
      <div class="actions">
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
            <th class="col5">Election Involved</th>
          </tr>
        </thead>
        <tbody class="wide">
            <?php for ($i = 0; $i < 10; $i++) { ?>
              <tr>
                <td class="col1">Name Placeholder</td>
                <td class="col2">CS101</td>
                <td class="col3">Party People</td>
                <td class="col4">President</td>
                <td class="col4">01/01/2001 12:00:00 AM</td>
                <td class="col4">Election 2023-2024</td>
              </tr>
            <?php } ?>
          </form>
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