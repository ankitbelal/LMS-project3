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
    <title>Admin Dashboard - Faculty</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/addFaculty.css" />

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
                <!-- Faculty and Subject Forms Container -->
                <div class="forms-container">
                    <!-- Faculty Form Section -->
                    <div class="faculty-form">
                        <h2>Update Faculty Info</h2>
                        <form id="facultyForm">
                            <div class="form-group">
                                <label for="faculty-id">Faculty ID</label>
                                <input type="text" id="faculty-id" name="faculty-id" required />
                            </div>
                            <div class="form-group">
                                <label for="faculty-name">Faculty Name</label>
                                <input type="text" id="faculty-name" name="faculty-name" required />
                            </div>
                            <div class="form-group">
                                <label for="total-semester">Total Semester</label>
                                <input type="number" id="total-semester" name="total-semester" required />
                            </div>
                            <div class="form-group">
                                <label for="total-subject">Total Subject</label>
                                <input type="number" id="total-subject" name="total-subject" required />
                            </div>
                            <button type="submit" class="btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>