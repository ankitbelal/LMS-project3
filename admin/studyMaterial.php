<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/studyMaterial.css"/>

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
      <div class="admin-study-material-container">
        <!-- Admin Controls -->
        <div class="admin-controls">
          <button class="btn primary-btn add-material-btn">Add Material</button>
        </div>
      
        <!-- Study Material Table -->
        <div class="study-material-table-container">
          <h2>Study Materials</h2>
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Faculty</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Data (Dynamically Populated in PHP) -->
              <tr>
                <td>Data Structures Notes</td>
                <td>Notes</td>
                <td>BE comp</td>
                <td>third</td>
                <td class="pending">Pending</td>
                <td>
                  <button class="btn success-btn approve-btn">Approve</button>
                  <button class="btn danger-btn reject-btn">Reject</button>
                </td>
              </tr>
              <tr>
                <td>Discrete Mathematics Syllabus</td>
                <td>Syllabus</td>
                <td>BCA</td>
                <td>fourth</td>
                <td class="approved">Approved</td>
                <td>
                  <button class="btn danger-btn delete-btn">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      
        <!-- Add Material Form -->
        <div class="add-material-form-container hidden">
          <form class="add-material-form">
            <h2>Add Study Material</h2>
            <div class="input-field">
              <label for="material-title">Title</label>
              <input type="text" id="material-title" placeholder="Material Title" required />
            </div>
            <div class="input-field">
              <label for="material-type">Type</label>
              <select id="material-type">
                <option value="Notes">Notes</option>
                <option value="Old Questions">Old Questions</option>
                <option value="Syllabus">Syllabus</option>
              </select>
            </div>
            <div class="input-field">
              <label for="faculty-name">Faculty</label>
              <input type="text" id="faculty-name" placeholder="Faculty Name" required />
            </div>
            <div class="input-field">
                <label for="semester">Semester</label>
                <select id="semester">
                    <option value="first">First</option>
                    <option value="second">Second</option>
                    <option value="third">Third</option>
                    <option value="fourth">Fourth</option>
                    <option value="fifth">Fifth</option>
                    <option value="sixth">Sixth</option>
                    <option value="seventh">Seventh</option>
                    <option value="eighth">Eighth</option>
                </select>
            </div>
            <div class="input-field">
              <label for="upload-file">Upload File</label>
              <input type="file" id="upload-file" required />
            </div>
            <button type="submit" class="btn primary-btn">Add Material</button>
          </form>
        </div>
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
        
      </div>
    </div>
    <script src="./index.js"></script>
    <script src="./material.js"></script>
  </body>
</html>
