<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./style.css" />

    <!--MATERIAL  CDN -->
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
        <h1>Dashboard</h1>
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

        <div class="recent-orders">
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
    <script src="./index.js"></script>
  </body>
</html>
