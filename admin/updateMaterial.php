<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/addMaterial.css" />

    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
    <?php include_once('includes/sidebar.php'); ?>
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
                    <!-- Add Material Form -->
                    <div class="add-material-form-container hidden">
                        <form class="add-material-form">
                            <h2 id="form-heading">Update Study Material</h2>
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
                            <button type="submit" class="btn primary-btn" id="form-submit-btn">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>