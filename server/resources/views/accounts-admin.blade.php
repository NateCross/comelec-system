<div class="container short">
  <?php include('views/components/messages/info/info.php') ?>
  <div class="page__header">
    <div class="group">
      <span class="group__title">Administrator's Account</span>
      <span class="group__description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
    </div>
    <div class="tab">
      <a href="accounts-profile.php">
        <span class="selector">My Profile</span>
      </a>
      <a href="accounts-admin.php">
        <span class="selector active">Accounts</span>
      </a>
    </div>
  </div>
  <div class="content">
    <div class="content__row">
      <div class="actions">
        <div class="actions__btn">
          <a href="accounts-admin-create.php">
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
            <?php for ($i = 0; $i < 10; $i++) { ?>
              <tr>
                <td class="col1">Name Placeholder</td>
                <td class="col2">CS101</td>
                <td class="col3">Bachelor of Science in Computer Science</td>
                <td class="col4">Admin</td>
                <td class="col5">
                  <a href="accounts-admin-edit.php">
                    <button class="secondary">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </a>
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