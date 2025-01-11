<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>admin dashboard</title>
  <!--STYLESHEET-->
  <link rel="stylesheet" href="./css/style.css" />

  <!--MATERIAL  CDN -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <img src="./images/logo.png" />
          <h2>ANY <span class="danger">NOTES</span></h2>
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp"> close </span>
        </div>
      </div>
      <div class="sidebar">
        <a href="./index.php"><span class="material-icons-sharp">grid_view</span>
          <h3>Dashboard</h3>
        </a>
        <a href="./users.php"><span class="material-icons-sharp"> person_outline</span>
          <h3>Users</h3>
        </a>
        <a href="./studyMaterial.php">
          <span class="material-icons-sharp">library_books</span>
          <h3>Study Materials</h3>
        </a>
        <a href=""><span class="material-icons-sharp">insights</span>
          <h3>Analytics</h3>
        </a>
        <a href=""><span class="material-icons-sharp">mail_outline</span>
          <h3>Messages</h3>
          <span class="message-count">36</span>
        </a>

        <a href=""><span class="material-icons-sharp">report_gmailerrorred</span>
          <h3>Reports</h3>
        </a>
        <a href=""><span class="material-icons-sharp">settings</span>
          <h3>setting</h3>
        </a>
        <!-- <a href=""
                ><span class="material-icons-sharp">add</span>
                <h3>Add Product</h3>
              </a> -->
        <a href=""><span class="material-icons-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>
    <div class="main-section">
      <!-- Right section at the top -->
      <div class="right">
        <div class="top">
          <!-- Dashboard heading on the left -->
          <h1>Dashboard</h1>

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
                <p>Hey, <b>Daniel</b></p>
                <small class="text-muted">Admin</small>
              </div>
              <div class="profile-photo">
                <span class="material-icons-sharp">
                  account_circle
                  </span>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <!--MAIN SECTION-->
      <main>
        <div class="date">
          <input type="date" />
        </div>

        <div class="insights">
          <div class="users">
            <span class="material-icons-sharp">analytics</span>
            <div class="middle">
              <div class="left">
                <h3>Total users</h3>
                <h1>100</h1>
              </div>
              <div class="progress">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>81%</p>
                </div>
              </div>
            </div>
            <small class="text-muted">last 24 hours</small>
          </div>
          <!--END OF USERS-->
          <div class="materials">
            <span class="material-icons-sharp">library_books</span>
            <div class="middle">
              <div class="left">
                <h3>Total Materials</h3>
                <h1>150</h1>
              </div>
              <div class="progress">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>75%</p>
                </div>
              </div>
            </div>
            <small class="text-muted">Last updated: Today</small>
          </div>
          <!--END OF MATERIALS-->
          <div class="insight downloads">
            <span class="material-icons-sharp">download</span>
            <div class="middle">
              <div class="left">
                <h3>Total Downloads</h3>
                <h1>320</h1>
              </div>
              <div class="progress">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">
                  <p>95%</p>
                </div>
              </div>
            </div>
            <small class="text-muted">This Month</small>
          </div>
          <!--END OF DOWNLOADS-->
        </div>
        <!--End of insights-->

        <div class="recents">
          <h2>Recent updates</h2>
          <table>
            <thead>
              <tr>
                <th>Material Name</th>
                <th>uploaded BY</th>
                <th>Date</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>
              <tr>
                <td>operating system</td>
                <td>test123</td>
                <td>09-09-2024</td>
                <td class="warning">Pending</td>
                <td class="primary">Details</td>
              </tr>

            </tbody>
          </table>
          <a href="#">Show All</a>
        </div>
      </main>
    </div>
  </div>
  <script src="./index.js"></script>
</body>

</html>