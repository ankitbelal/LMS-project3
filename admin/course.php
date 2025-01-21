<?php 
     require_once('../configs/config.php');
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }
     require '../classes/courseCRUD.php';
     $getInfo=new courseCRUD();
     $listCourse=$getInfo->list();
     $subjects=$getInfo->getSubject();
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
                <!-- Course Table -->
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
                            <?php 
                                $i=1;
                                foreach($listCourse as $course){
                            ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $course['course_id']?></td>
                                <td><?php echo $course['course_name']?></td>
                                <td><?php echo $course['total_semester']?></td>
                                <td><?php echo $course['total_subject']?></td>
                                <td>
                                    <button class="edit-btn" onclick="window.location.href='./updateCourse.php?id=<?php echo $course['course_id'];?>'">Edit</button>
                                    <button class="delete-btn">Delete</button>
                                </td>
                            </tr>
                            <?php $i++;}?>
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
                            <?php 
                            $i=1;
                            foreach($subjects as $subject){ 
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $subject['subject_id'] ?></td>
                                <td><?php echo $subject['subject_name'] ?></td>
                                <td><?php echo $subject['semester'] ?></td>
                                <td><?php echo $subject['course_id'] ?></td>
                                <td>
                                    <button class="edit-btn" onclick="window.location.href='./updateSubject.php?id=<?php echo $subject['subject_id'];?>'">Edit</button>
                                    <button class="delete-btn">Delete</button>
                                </td>
                            </tr>
                            <?php $i++;}?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
    
</body>

</html>