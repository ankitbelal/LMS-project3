<?php 
    require '../classes/materialCRUD.php';
    require '../configs/config.php';
    //check session
    session_start();
    if(!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])){
        http_response_code(403); // Forbidden
        echo "Unauthorized access.";
        header("Location:".BASE_PATH."/admin");
        exit();
    }

    if(!isset($_GET["id"])){
        http_response_code(400); // Bad Request
      echo "Course ID is missing.";
      exit();
    }

    $id=$_GET['id'];
    $materialCRUD=new materialCRUD();
    //get file name from database
    $fileInfo=$materialCRUD->getMaterialById($id);
    if (!$fileInfo) {
        http_response_code(404);
        echo "Material not found.";
        exit();
    }

    //delete physical file
    $uploadDir="../uploads/";
    $filePath=$uploadDir.$fileInfo['file_name'];
    
    // if(!file_exists($filePath)){
        
    //     die("<script>alert('File doesn't exists'); window.history.back();</script>");
    //     exit();
    // }else{
    //     if(!unlink($filePath)){
    //         http_response_code(500);
    //         die("<script>alert('Failed to delete file!'); window.history.back();</script>");
    //         exit();
    //     }
    // }
    if(file_exists($filePath)){
        if(!unlink($filePath)){
            http_response_code(500);
            die("<script>alert('Failed to delete,check if the exists or not?'); window.history.back();</script>");
            exit();
        }
    }

    //perform deletion
    $deleted=$materialCRUD->deleteMaterial($id);

    if($deleted){
        $materials=$materialCRUD->getMaterials();
        echo "<tbody id='tbody-1'>";
        $i=1;
        foreach($materials as $material){
            echo "<tr>";
            echo "<td>".htmlspecialchars($material['course_id'])."</td>";
            echo "<td>".htmlspecialchars($material['semester'])."</td>";
            echo "<td>".htmlspecialchars($material['subject_name'])."</td>";
            echo "<td>".htmlspecialchars($material['material_type'])."</td>";
            echo "<td>".htmlspecialchars($material['file_desc'])."</td>";
            echo "<td>".htmlspecialchars($material['file_name'])."</td>";
            echo "<td>".htmlspecialchars($material['uploaded_at'])."</td>";
            echo"<td>";
            echo "<button class='edit-btn' onclick=\"window.location.href='./updateMaterial.php?id=" . htmlspecialchars($material['material_id']) . "'\">Edit</button>";
            echo "<button class='delete-btn' hx-delete='deleteMaterials.php?id=" . htmlspecialchars($material['material_id']) . "' hx-target='#tbody-1' hx-swap='outerHTML' hx-confirm='Are you sure you want to delete this row?'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
    }else{
        // Return an error response
    http_response_code(500); // Internal Server Error
    echo "Failed to delete the course.";
    exit();
    }