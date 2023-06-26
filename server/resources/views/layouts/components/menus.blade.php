<div class="menu user">
 <div class="menu__content">
  <div class="actions">
   <a href="{{ route('account.profile') }}">
    <span class="name">My Profile</span>
    <i class="fa-solid fa-user-large"></i>
   </a>
   <a onclick="logout()" style="cursor: pointer">
    <span class="name">Sign Out</span>
    <i class="fa-solid fa-arrow-right-from-bracket"></i>
   </a>
  </div>
 </div>
</div>

<script>
  function logout() {
    axios.post(
      route('logout'),
    ).then(() => window.location.href = route('login'));
  }
</script>