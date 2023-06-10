<div class="container short">
  <?php include('views/components/messages/info/info.php') ?>
  <div class="page__header">
    <div class="group">
      <span class="group__title">Edit Student Account</span>
      <a href="student-accounts.php">
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
        <span class="title">ACCOUNT CREDENTIALS</span>
        <div class="fields">
          <div class="group">
            <div class="field">
              <label for="name">Name</label>
              <input id="name" type="text" name="name" required autocomplete="name" autofocus>
            </div>
            <div class="field">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" required autocomplete="password">
            </div>
          </div>
          <div class="field input single">
            <label for="student_id">Status</label>
            <select name="status">
              <option value="0">Select Status</option>
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>
        <div class="page__actions">
          <button type="submit" class="tertiary wide">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>