<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/studyMaterial.css" />

    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
    <?php include_once('includes/sidebar.php');?>
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
                                <span class="material-icons-sharp">account_circle</span>
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
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Faculty</th>
                                        <th>Semester</th>
                                        <th>Edit | Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example Data (Dynamically Populated in PHP) -->
                                    <tr>
                                        <td>Data Structures Notes</td>
                                        <td>Notes</td>
                                        <td>BE comp</td>
                                        <td>third</td>
                                        <td>
                                            <button class="btn edit-btn" data-id="1">Edit</button>
                                            <button class="btn danger-btn delete-btn">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Discrete Mathematics Syllabus</td>
                                        <td>Syllabus</td>
                                        <td>BCA</td>
                                        <td>fourth</td>
                                        <td>
                                            <button class="btn edit-btn" data-id="2">Edit</button>
                                            <button class="btn danger-btn delete-btn">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Add Material Form -->
                    <div class="add-material-form-container hidden">
                        <form class="add-material-form">
                            <h2 id="form-heading">Add Study Material</h2>
                            <input type="hidden" id="material-id" value="" />
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
                            <button type="submit" class="btn primary-btn" id="form-submit-btn">Add</button>
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
            const formHeading = document.querySelector("#form-heading");
            const formSubmitBtn = document.querySelector("#form-submit-btn");
            const materialIdInput = document.querySelector("#material-id");

            // Toggle form visibility
            if (addMaterialBtn && addMaterialFormContainer) {
                addMaterialBtn.addEventListener("click", () => {
                    addMaterialFormContainer.classList.toggle("hidden");
                    formHeading.textContent = "Add Study Material";
                    formSubmitBtn.textContent = "Add";
                    materialIdInput.value = ""; // Clear the material ID
                });
            }

            // Edit Button Functionality
            document.querySelectorAll(".edit-btn").forEach((btn) => {
                btn.addEventListener("click", () => {
                    const row = btn.closest("tr");
                    const cells = row.querySelectorAll("td");

                    // Populate form with existing data
                    document.querySelector("#material-title").value = cells[0].textContent;
                    document.querySelector("#material-type").value = cells[1].textContent;
                    document.querySelector("#faculty-name").value = cells[2].textContent;
                    document.querySelector("#semester").value = cells[3].textContent.toLowerCase();

                    // Change form heading and button text
                    formHeading.textContent = "Update Study Material";
                    formSubmitBtn.textContent = "Update";
                    materialIdInput.value = btn.getAttribute("data-id"); // Set the material ID

                    // Show the form
                    addMaterialFormContainer.classList.remove("hidden");
                });
            });

            // Delete Button Functionality
            document.querySelectorAll(".delete-btn").forEach((btn) => {
                btn.addEventListener("click", () => {
                    const row = btn.closest("tr");
                    row.remove(); // Remove the row
                });
            });

            // Form Submission Handling
            const form = document.querySelector(".add-material-form");
            form.addEventListener("submit", (e) => {
                e.preventDefault();

                const materialId = materialIdInput.value;
                const title = document.querySelector("#material-title").value;
                const type = document.querySelector("#material-type").value;
                const faculty = document.querySelector("#faculty-name").value;
                const semester = document.querySelector("#semester").value;

                if (materialId) {
                    // Update existing material
                    const row = document.querySelector(`.edit-btn[data-id="${materialId}"]`).closest("tr");
                    row.querySelector("td:nth-child(1)").textContent = title;
                    row.querySelector("td:nth-child(2)").textContent = type;
                    row.querySelector("td:nth-child(3)").textContent = faculty;
                    row.querySelector("td:nth-child(4)").textContent = semester;
                } else {
                    // Add new material
                    const newRow = `
                        <tr>
                            <td>${title}</td>
                            <td>${type}</td>
                            <td>${faculty}</td>
                            <td>${semester}</td>
                            <td>
                                <button class="btn edit-btn" data-id="${Date.now()}">Edit</button>
                                <button class="btn danger-btn delete-btn">Delete</button>
                            </td>
                        </tr>
                    `;
                    document.querySelector("tbody").insertAdjacentHTML("beforeend", newRow);
                }

                // Reset the form
                form.reset();
                addMaterialFormContainer.classList.add("hidden");
            });

            // Toggle sidebar on mobile
            const menuBtn = document.querySelector("#menu-btn");
            const closeBtn = document.querySelector("#close-btn");
            const sidebar = document.querySelector("aside");

            if (menuBtn && sidebar) {
                menuBtn.addEventListener("click", () => {
                    sidebar.style.display = "block";
                    sidebar.classList.add("show");
                });
            }

            if (closeBtn && sidebar) {
                closeBtn.addEventListener("click", () => {
                    sidebar.classList.remove("show");
                    sidebar.style.display = "none";
                });
            }
        });
    </script>
</body>

</html>