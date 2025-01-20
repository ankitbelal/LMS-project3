<?php
  require_once('../classes/User.php');
  session_start();
  $info = new User();
  $username = $_SESSION['username'];
  $userData = $info->getData($username);

  // Split full name into first name
  $fullName = $userData['name'];
  $names = explode(' ', $fullName);
  $firstName = isset($names[0]) ? $names[0] : '';
?>

<div class="right">
  <div class="top">
    <!-- Menu button, theme toggler, and profile on the right -->
    <div class="right-elements">
      <button id="menu-btn">
        <span class="material-icons-sharp">menu</span>
      </button>
      <div class="theme-toggler">
        <span class="material-icons-sharp active">light_mode</span>
        <span class="material-icons-sharp">dark_mode</span>
      </div>
      <div class="profile">
        <div class="info">
          <p>Hey, <b><?php echo htmlspecialchars($firstName); ?></b></p>
          <small class="text-muted">Admin</small>
        </div>
        <div class="profile-photo">
          <span class="material-icons-sharp">account_circle</span>
        </div>
      </div>
    </div>
  </div>
</div>