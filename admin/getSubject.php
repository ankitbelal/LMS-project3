<?php 
    require_once('../classes/courseCRUD.php');

    $course_id=$_GET['course-id'];
    $semester = $_GET['semester'];
    
    $courseCRUD = new courseCRUD();
    $subjects = $courseCRUD->getSubjectsBySemester($course_id, $semester);

    foreach ($subjects as $subject) {
        echo "<option value='{$subject['subject_id']}'>{$subject['subject_name']}</option>";
    }
       
?>