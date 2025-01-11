<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/studyMaterial.css" />

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
                <a href=""><span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <div class="main-section">
            <!-- Right section at the top -->
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
                            <button type="submit" class="btn primary-btn">Add</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
    const addMaterialBtn = document.querySelector(".add-material-btn");
    const addMaterialFormContainer = document.querySelector(".add-material-form-container");
  
    if (addMaterialBtn && addMaterialFormContainer) {
      // Add a single event listener for the Add Material button
      addMaterialBtn.addEventListener("click", () => {
        console.log("Add Material button clicked!");
        addMaterialFormContainer.classList.toggle("hidden");
      });
    } else {
      console.error("Add Material button or form container not found!");
    }
  
    // Approve Button Functionality
    document.querySelectorAll(".approve-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        row.querySelector("td:nth-child(5)").textContent = "Approved";
        row.querySelector("td:nth-child(5)").classList.remove("pending");
        row.querySelector("td:nth-child(5)").classList.add("approved");
        btn.remove(); // Remove Approve button
      });
    });
  
    // Reject Button Functionality
    document.querySelectorAll(".reject-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        row.remove(); // Remove the row
      });
    });
  
    // Delete Button Functionality
    document.querySelectorAll(".delete-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const row = btn.closest("tr");
        row.remove(); // Remove the row
      });
    });
  });
  
    </script>
</body>

</html>