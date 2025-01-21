<?php 
     require_once('../configs/config.php');
     require_once('../classes/courseCRUD.php');
     $info= new courseCRUD();
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }
     
     $course_id=$_GET['id'];
     $listData=$info->getCourseByID($course_id);
    
    if(isset($_POST['submit'])){
        $updated=$info->updateCourse($_POST,$course_id);
        if($updated){
            header("Location:".BASE_PATH."/admin/course.php");
        }else{
            echo "<script>alert('course not updated')</script>";
        }
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
            <?php include_once('includes/right.php'); ?>

            <!--MAIN SECTION-->
            <main>
                <!-- Faculty and Subject Forms Container -->
                <div class="forms-container">
                    <!-- Faculty Form Section -->
                    <div class="faculty-form">
                        <h2>Update Course Info</h2>
                        <form id="facultyForm" action="" method="POST">
                            <div class="form-group">
                                <label for="faculty-name">Course Name</label>
                                <input type="text" id="faculty-name" name="course-name" value="<?php echo $listData['course_name'];?>" required />
                            </div>
                            <div class="form-group">
                                <label for="total-semester">Total Semester</label>
                                <input type="number" id="total-semester" name="total-semester" value="<?php echo $listData['total_semester'];?>" required />
                            </div>
                            <div class="form-group">
                                <label for="total-subject">Total Subject</label>
                                <input type="number" id="total-subject" name="total-subject" value="<?php echo $listData['total_subject'];?>" required />
                            </div>
                            <button type="submit" name="submit" class="btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>