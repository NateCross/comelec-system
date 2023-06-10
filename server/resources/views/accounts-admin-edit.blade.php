<div class="container short">
  <?php include('views/components/messages/info/info.php') ?>
  <div class="page__header">
    <div class="group">
      <span class="group__title">Edit Account</span>
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
            <div class="field readonly">
              <label for="student_id">Student ID</label>
              <input id="student_id" type="text" class="form-control" name="student_id" required autocomplete="student_id" readonly>
            </div>
            <div class="field input">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control" name="password" required autocomplete="password">
            </div>
          </div>
          <div class="group">
            <div class="field input">
              <label for="username">Username</label>
              <input id="username" type="text" name="username" required autocomplete="username">
            </div>
            <div class="field short">
              <label for="student_id">User Role</label>
              <select name="position_id">
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
          <button type="submit" class="tertiary wide">Update Account</button>
        </div>
      </form>
    </div>
  </div>
</div>