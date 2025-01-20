<?php 
     require_once('../configs/config.php');
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }
?>
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
            <?php include_once('includes/right.php'); ?>

            <!--MAIN SECTION-->
            <main>
                <div class="admin-study-material-container">
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
                            <button type="submit" class="btn primary-btn" id="form-submit-btn">
                                Add
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