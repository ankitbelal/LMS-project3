<?php 
     require_once('../configs/config.php');
     require_once('../classes/materialCRUD.php');
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }
     //fetch material data
     if(isset($_GET['id'])){
        $Mid=$_GET['id'];
        $CID=$_GET['courseId'];
        $materialCRUD=new materialCRUD();
        $materials=$materialCRUD->getMaterialById($Mid);
        $courseInfo=$materialCRUD->getCourseId();
        $totalSem=$materialCRUD->getSem($CID);
        $subjects=$materialCRUD->getSubject($materials['course_id'],$materials['semester']);    
     }
     // Display errors from session (if any)
    $errors = isset($_SESSION['form_errors']) ? $_SESSION['form_errors'] : [];
    unset($_SESSION['form_errors']);
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
                    <div class="add-material-form-container ">
                        <form class="add-material-form" action="saveUpdatedMaterial.php" method="POST" enctype="multipart/form-data">
                            <h2 id="form-heading">Update Study Material</h2>
                            <input type="hidden" name="material_id" value="<?php echo $materials['material_id']; ?>">
                            <!-- Error messages container -->
                            
                            <?php if (!empty($errors)): ?>
                                <div id="form-messages" class="error-messages visible">
                                    <?php foreach ($errors as $error): ?>
                                        <p><?php echo $error; ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <div class="input-field">
                                <label for="course-id">Course</label>
                                <select id="course-id" name="course-id" hx-get="getSemester.php" hx-target="#semester" hx-trigger="change" required onchange="clearSubjects()">
                                <?php 
                                $selected="";
                                foreach($courseInfo as $id){?>
                                    <option value="<?php echo $id['course_id'];?>" <?php if($materials['course_id']==$id['course_id']){echo "selected";}?>>
                                        <?php echo $id['course_id'];?>
                                    </option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="semester">Semester</label>
                                <select id="semester" name="semester" required hx-get="getSubject.php" hx-target="#subject" hx-trigger="change,load" hx-include="[name='course-id']"> <!-- Include course_id in the request -->
                                <?php for($i=1;$i<=$totalSem['total_semester'];$i++){?>
                                    <option value="<?php echo $i;?>" <?php if($materials['semester']==$i){echo "selected";}?>>Semester <?php echo $i;?></option>
                                    <?php };?>
                                </select>   
                            </div>
                            <div class="input-field">
                                <label for="subject">Subject</label>
                                <select id="subject" name="subject-id" required>
                                    <option value="">--Select Subject--</option>
                                    <?php foreach($subjects as $subject){?>
                                        <option value="<?php echo $subject['subject_id'];?>" <?php if($subject['subject_id']==$materials['subject_id']){echo 'selected';}?>><?php echo $subject['subject_name'];?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="material-type">Type</label>
                                <select id="material-type" name="material-type">
                                    <option value="Notes" <?php if($materials['material_type']=='Notes'){echo 'selected';}?>>Notes</option>
                                    <option value="Old Questions" <?php if($materials['material_type']=='Old Questions'){echo 'selected';}?>>Old Questions</option>
                                    <option value="Syllabus" <?php if($materials['material_type']=='Syllabus'){echo 'selected';}?>>Syllabus</option>
                                </select>
                            </div>                       
                            <div class="input-field">
                                <label for="upload-file">Upload File (Leave blank to keep existing file)</label>
                                <?php if (!empty($materials['file_name'])): ?>
                                <p>Current File: <?php echo $materials['file_name']; ?></p>
                                <?php endif; ?>
                                <input type="file" id="upload-file" name="file" />
                            </div>
                            <div class="input-field">
                                <label for="file-desc">File Description</label>     
                                <textarea id="file-desc" name="file-desc" placeholder="Enter a description........" rows="3"><?php echo htmlspecialchars($materials['file_desc']);?></textarea>
                            </div>
                            <button type="submit" class="btn primary-btn" id="form-submit-btn">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
<script src="./index.js"></script>
<script>

    document.getElementById('file-desc').addEventListener('input',function(){
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    })
    function clearSubjects() {
        document.getElementById('subject').innerHTML = '';
    }   

    // Auto-hide error messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
            const errorContainer = document.getElementById('form-messages');
            if (errorContainer) {
                setTimeout(() => {
                    errorContainer.classList.remove('visible');
                    errorContainer.classList.add('hidden');
                }, 3000);
            }
        });
</script>
</body>
</html>