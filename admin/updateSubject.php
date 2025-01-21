<?php 
     require_once('../configs/config.php');
     require_once('../classes/courseCRUD.php');
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }
     $info= new courseCRUD();
     $subject_id=$_GET['id'];
     $listData=$info->getSubjectById($subject_id);
     $courseinfo=$info->getCourseId();
    
     if(isset($_POST['submit'])){
        $updated=$info->updateSubject($_POST,$course_id);
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
    <link rel="stylesheet" href="./css/addSubject.css" />
    <script src="https://unpkg.com/htmx.org"></script>
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
                        <form id="subjectForm" action="" method="POST">
                            <div class="form-group">
                                <label for="subject-name">Subject Name</label>
                                <input type="text" id="subject-name" name="subject-name" value="<?php echo $listData['subject_name'];?>" required />
                            </div>
                            <div class="form-group">
                                <label for="faculty">Course</label>
                                <select id="faculty" name="course-id" hx-get="./getSemester.php" hx-target="#semester" hx-trigger="change" rquired>
                                <?php foreach($courseinfo as $id){?>
                                    <option>
                                        <?php echo $id['course_id'];?>
                                    </option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select id="semester" name="semester" required>
                                    <!-- Options will be populated dynamically -->
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn-primary">update</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
   
</body>

</html>