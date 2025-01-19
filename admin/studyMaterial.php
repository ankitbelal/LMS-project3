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
                        <button class="btn primary-btn add-material-btn" onclick="window.location.href='./addMaterial.php'">Add Material</button>
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
                                            <button class="btn edit-btn" data-id="1" onclick="window.location.href='./updateMaterial.php'">Edit</button>
                                            <button class="btn danger-btn delete-btn">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Discrete Mathematics Syllabus</td>
                                        <td>Syllabus</td>
                                        <td>BCA</td>
                                        <td>fourth</td>
                                        <td>
                                            <button class="btn edit-btn" data-id="2" onclick="window.location.href='./updateMaterial.php'">Edit</button>
                                            <button class="btn danger-btn delete-btn">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>