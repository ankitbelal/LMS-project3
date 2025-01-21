<?php 
     require_once('../configs/config.php');
     require_once('../classes/courseCRUD.php');
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }

     $course=new courseCRUD();
     $courseinfo=$course->getCourseId();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/addMaterial.css" />
    <script src="./htmx.js"></script>
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
                        <form class="add-material-form" action="saveMaterial.php" method="POST" enctype="multipart/form-data">
                            <h2 id="form-heading">Add Study Material</h2>
                            <div class="input-field">
                                <label for="course-id">Course</label>
                                <select id="course-id" name="course-id" hx-get="getSemester.php" hx-target="#semester" hx-trigger="change,load" required onchange="clearSubjects()">
                                <?php foreach($courseinfo as $id){?>
                                    <option value="<?php echo $id['course_id'];?>">
                                        <?php echo $id['course_id'];?>
                                    </option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="semester">Semester</label>
                                <select id="semester" name="semester" required hx-get="getSubject.php" hx-target="#subject" hx-trigger="change,load" hx-include="[name='course-id']"> <!-- Include course_id in the request -->
                                     
                                </select>
                            </div>
                            <div class="input-field">
                            <label for="subject">Subject</label>
                                <select id="subject">

                                </select>
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
                                <label for="upload-file">Upload File</label>
                                <input type="file" id="upload-file" name="materialFile" required />
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
<script>
    function clearSubjects() {
        document.getElementById('subject').innerHTML = '';
    }   
</script>
</body>

</html>