<div class="modal delete">
  <div class="wrapper">
    <div class="exit">
      <button class="secondary" id="delete-exit-btn">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
    <img src="assets/images/throw_away.svg" alt="Throw Away Item">
    <div class="group">
      <span class="title">You are about to delete this row.</span>
      <span class="description">If you delete this row data,  you can't recover it.</span>
    </div>
    <div class="actions">
      <button class="primary wide">Delete</button>
      <button class="secondary wide" id="modal-exit-btn">Cancel</button>
    </div>
  </div>
</div>

<div class="modal verify">
  <div class="wrapper">
    <div class="exit" id="verify-exit-btn">
      <button class="secondary">
      <i class="fa-solid fa-xmark"></i>
    </button>
    </div>
    <div class="group">
      <span class="title">Would you like to verify this student?</span>
      <span class="description">If you are to verify this student, the status will be set to verified.</span>
    </div>
    <div class="actions">
      <button class="primary wide">Verify</button>
      <button class="secondary wide" id="deny-btn">Deny</button>
    </div>
  </div>
</div>

<div class="modal deny">
  <form action="" method="" class="modify">
    <div class="wrapper">
      <div class="exit" id="deny-exit-btn">
        <button class="secondary">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
    <div class="group">
      <span class="title">Provide a reason to deny</span>
    </div>
    <div class="fields">
      <div class="field">
        <textarea id="reason" type="text" name="reason" required autocomplete="reason" autofocus></textarea>
      </div>
    </div>
    <div class="actions">
      <button class="primary wide" type="submit">Submit</button>
    </div>
  </form>
</div>

<div class="modal account">
  <div class="wrapper">
    <div class="exit">
      <button class="secondary" id="account-delete-exit-btn">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
    <div class="group">
      <span class="title">Are you sure you want to delete your account?</span>
      <span class="description">Your account will be permanently deleted. This cannot be undone.</span>
    </div>
    <div class="actions">
      <button class="primary wide">Delete</button>
      <button class="secondary wide" id="modal-exit-btn">Cancel</button>
    </div>
  </div>
</div>