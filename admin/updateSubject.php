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
    <link rel="stylesheet" href="./css/addSubject.css" />

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
                <!-- Faculty and Subject Forms Container -->
                <div class="forms-container">
                    <!-- Subject Form Section -->
                    <div class="subject-form">
                        <h2>Update Subject info </h2>
                        <form id="subjectForm">
                            <div class="form-group">
                                <label for="subject-id">Subject ID</label>
                                <input type="text" id="subject-id" name="subject-id" required />
                            </div>
                            <div class="form-group">
                                <label for="subject-name">Subject Name</label>
                                <input type="text" id="subject-name" name="subject-name" required />
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="number" id="semester" name="semester" required />
                            </div>
                            <div class="form-group">
                                <label for="faculty">Faculty</label>
                                <select id="faculty" name="faculty">
                                    <option value="BE Comp">BE Comp</option>
                                    <option value="BE IT">BE IT</option>
                                    <option value="BE Mech">BE Mech</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-primary">update</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
   
</body>

</html>