<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/userstyles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
</head>
<body>
    <div class="container">
        <?php include_once('includes/sidebar.php')?>
        <!--MAIN SECTION-->
      <main>
        <div class="user-table">
          <h2>Users</h2>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Role
                <th>Edit | Delete</th>
              </tr>
            </thead>
            <tbody>
              <!-- Placeholder rows -->
              <tr>
                <td>John Doe</td>
                <td>johndoe</td>
                <td>johndoe@example.com</td>
                <td>1234567890</td>
                <td>123 Main Street</td>
                <td>Admin</td>
                <td>
                  <a href="#">Edit</a>
                  |
                  <a href="#">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
      <!---END OF MAIN SECTION-->
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
                    <img src="./images/profile-1.jpg">
                </div>
            </div>
        </div>
        <!--END OF TOP-->
      </div>
    </div>
    <script src="./index.js"></script>
</body>
</html>