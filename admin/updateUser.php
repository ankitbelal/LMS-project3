<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Update</title>
    <link rel="stylesheet" href="./css/updateUser.css" />
    <link rel="stylesheet" href="./css/style.css"/>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
    />
  </head>
  <body>
  <div class="container">
      <?php include_once('includes/sidebar.php'); ?>
      <!--MAIN SECTION-->
      <main>
      <div class="update-container">
      <form class="update-form">
        <h2>Update User Profile</h2>

        <div class="input-field">
          <span class="material-icons-sharp">badge</span>
          <input type="text" placeholder="First Name" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">badge</span>
          <input type="text" placeholder="Last Name" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">person</span>
          <input type="text" placeholder="Username" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">mail</span>
          <input type="email" placeholder="Email" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">phone</span>
          <input type="text" placeholder="Contact" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">home</span>
          <input type="text" placeholder="Address" required />
        </div>

        <button type="submit" class="btn primary-btn">Update</button>
      </form>
    </div>
      </main>

      <div class="right">
        <div class="top">
          <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
          </button>
          <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
          </div>
          <div class="profile">
            <div class="info">
              <p>Hey, <b>Daniel</b></p>
              <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
              <img src="./images/profile-1.jpg" />
            </div>
          </div>
        </div>
        <!--END OF TOP-->
        <div class="recent-updates">
          <h2>Recent Updates</h2>
          <div class="updates">
            <div class="update">
              <div class="profile-photo">
                <img src="./images/profile-2.jpg" />
              </div>
              <div class="message">
                <p><b>Mike Tyson</b>changed his profile this afternoon</p>
                <small class="text-muted">2 Minutes ago</small>
              </div>
            </div>
            <div class="update">
              <div class="profile-photo">
                <img src="./images/profile-3.jpg" />
              </div>
              <div class="message">
                <p><b>Mike Tyson</b>changed his profile this afternoon</p>
                <small class="text-muted">2 Minutes ago</small>
              </div>
            </div>
            <div class="update">
              <div class="profile-photo">
                <img src="./images/profile-4.jpg" />
              </div>
              <div class="message">
                <p><b>Mike Tyson</b>changed his profile this afternoon</p>
                <small class="text-muted">2 Minutes ago</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
