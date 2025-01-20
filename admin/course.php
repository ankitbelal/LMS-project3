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
    <link rel="stylesheet" href="./css/faculty.css" />

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
                <!-- Faculty Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2>Course List</h2>
                        <button class="add-btn" onclick="window.location.href='./addCourse.php'">Add Courses</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Total Semester</th>
                                <th>Total Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td>1</td>
                                <td>F001</td>
                                <td>BE Comp</td>
                                <td>8</td>
                                <td>40</td>
                                <td>
                                    <button class="edit-btn" onclick="window.location.href='./updateFaculty.php'">Edit</button>
                                    <button class="delete-btn">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Subject Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2>Subject List</h2>
                        <button class="add-btn" onclick="window.location.href='./addSubject.php'">Add Subject</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                                <th>Semester</th>
                                <th>Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td>1</td>
                                <td>S001</td>
                                <td>Data Structures</td>
                                <td>3</td>
                                <td>BE Comp</td>
                                <td>
                                    <button class="edit-btn" onclick="window.location.href='./updateSubject.php'">Edit</button>
                                    <button class="delete-btn">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
    
</body>

</html>