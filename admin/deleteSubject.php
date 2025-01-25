<?php
      require '../classes/courseCRUD.php';
      // Get the ID from the query parameter
      session_start();
      // Check if the user is logged in and is an admin
  if (!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])) {
      http_response_code(403); // Forbidden
      echo "Unauthorized access.";
      exit();
  }
  
  // Get the course ID from the query parameter
  if (!isset($_GET['id'])) {
      http_response_code(400); // Bad Request
      echo "Course ID is missing.";
      exit();
  }

     $id = $_GET["id"];
    // Perform the deletion
    $courseCRUD = new courseCRUD();
    $deleted = $courseCRUD->deleteSubject($id);

    if($deleted){
        $subjects=$courseCRUD->getSubject();
        //generate updated tbdoy html
        echo "<tbody id='tbody-2'>";
        $i=1;
        foreach($subjects as $subject){
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".htmlspecialchars($subject['subject_id'])."</td>";
            echo "<td>".htmlspecialchars($subject['subject_name'])."</td>";
            echo "<td>".htmlspecialchars($subject['semester'])."</td>";
            echo "<td>".htmlspecialchars($subject['course_id'])."</td>";
            echo "<td>";
            echo "<button class='edit-btn' onclick=\"window.location.href='./updateSubject.php?id=" . htmlspecialchars($subject['subject_id']) . "'\">Edit</button>";
            echo "<button class='delete-btn' hx-delete='deleteSubject.php?id=" . htmlspecialchars($subject['subject_id']) . "' hx-target='#tbody-1' hx-swap='outerHTML' hx-confirm='Are you sure you want to delete this row?'>Delete</button>";
            echo "</td>";
            $i++;
        }
        echo "</tbody>";
    }else{
        // Return an error response
    http_response_code(500); // Internal Server Error
    echo "Failed to delete the course.";
    exit();
    }
?>