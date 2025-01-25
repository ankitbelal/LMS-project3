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
    <link rel="stylesheet" href="./css/course.css" />
    <script src="./htmx.js"></script>
    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                        <tbody id="tbody-1">
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
                                <div class="button-container">
                                    <button class="edit-btn" onclick="window.location.href='./updateCourse.php?id=<?php echo $course['course_id'];?>'">Edit</button>
                                    <button class="delete-btn" hx-delete="deleteCourse.php?id=<?php echo $course['course_id'];?>" hx-target="#tbody-1" hx-swap="outerHTML"  hx-confirm="Are you sure you want to delete this row?">Delete</button>
                                </div>
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
                        <tbody id="tbody-2">
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
                                <div class="button-container">
                                    <button class="edit-btn" onclick="window.location.href='./updateSubject.php?id=<?php echo $subject['subject_id'];?>'">Edit</button>
                                    <button class="delete-btn" hx-delete="deleteSubject.php?id=<?php echo $subject['subject_id'];?>" hx-target="#tbody-2" hx-swap="outerHTML"  hx-confirm="Are you sure you want to delete this row?">Delete</button>
                                </div>
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