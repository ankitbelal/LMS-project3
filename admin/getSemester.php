<?php 
    require_once('../configs/Database.php');
    $course_id=$_GET['course-id'];
    
    $conn=new Database();
    $result=$conn->getConnection()->prepare("select * from course where course_id=:course_id");
    $result->bindParam(':course_id',$course_id);
    $result->execute();
    $semester = $result->fetch(PDO::FETCH_ASSOC);

    if ($semester) {
        $total_semester = $semester['total_semester'];
        // Generate the semester options as HTML
        echo"<option value=''>--Select Semester--</option>";
        for ($i = 1; $i <= $total_semester; $i++) {
            echo "<option value='$i'>Semester $i</option>";
        }
    } else {
        echo "<option value=''>No semesters found</option>";
    } 
       
?>