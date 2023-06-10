<div class="container short">
  <?php include('views/components/messages/info/info.php') ?>
  <div class="page__header">
    <div class="group">
      <span class="group__title">Add Account</span>
      <a href="accounts-admin.php">
        <button class="primary bold">
          <i class="fa-solid fa-arrow-left-long"></i>
          Go Back
        </button>
      </a>
    </div>
    <span class="description">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...</span>
  </div>
  <div class="content">
    <div class="content__row">
      <form class="modify" action="" method="">
        <span class="title">BASIC INFORMATION</span>
        <div class="fields">
          <div class="group">
            <div class="field input">
              <label for="student_id">Student ID</label>
              <input id="student_id" type="text" name="student_id" required autocomplete="student_id" autofocus>
            </div>
            <div class="field input">
              <label for="last_name">Password</label>
              <input id="last_name" type="text" name="last_name" required autocomplete="last_name">
            </div>
          </div>
          <div class="group">
            <div class="field input">
              <label for="username">Username</label>
              <input id="username" type="text" name="username" required autocomplete="username">
            </div>
            <div class="field short">
              <label for="user_role">User Role</label>
              <select name="user_role">
                <option value="0">Select Role</option>
                <option value="1">Super Admin</option>
                <option value="2">Admin</option>
                <option value="3">Student Accounts Manager</option>
                <option value="4">Commissioner</option>
                <option value="5">Poll Workers</option>
              </select>
            </div>
          </div>
        </div>
        <div class="page__actions">
          <button type="submit" class="tertiary wide">Add Account</button>
        </div>
      </form>
    </div>
  </div>
</div>