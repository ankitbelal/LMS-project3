<?php
    require '../classes/Contribution.php';
    require '../configs/config.php';
    session_start();
    if(!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])){
        http_response_code(403); // Forbidden
        echo "Unauthorized access.";
        exit();
    }

    $id=$_GET['id'];
    $contribute=new Contribution();
    //delete the contributed file from the directory;
    $fileName=$contribute->getContributionById($id);
    $filePath="../uploads/".$fileName['file_name'];
    if(file_exists($filePath)){
        unlink($filePath);
    }else{
        echo "script>alert('File not found');</script>";
        header("Location:".BASE_PATH."/admin/contribute.php");
    }
    

    $deleted=$contribute->deleteContribution($id);
    $listInfo=$contribute->getContributed();
    if($deleted){
        //populate the table with updated data
    echo "<tbody id='tbody-1'>";
    foreach($listInfo as $list){
            echo "<tr data-status='".$list['status']."'>";
                echo "<td>".$list['course_id']."</td>";
                echo "<td>".$list['semester']."</td>";
                echo "<td>".$list['subject_name']."</td>";
                echo "<td>".$list['content_type']."</td>";
                echo "<td><a href='../uploads/".$list['file_name']."' target='_blank'>".$list['file_name']."</a></td>"; 
                echo "<td>".$list['description']."</td>";
                echo "<td>".$list['email']."</td>";
                echo "<td>".$list['uploaded_at']."</td>";
                echo "<td class='status-cell'>";
                echo "<span class='status-badge ".strtolower($list['status'])."'>";
                echo $list['status'];
                echo "</span?";
                echo "</td>";
                echo "<td>";
                echo "<div class='button-container'>";
                if($list['status']=='pending'){ 
                    echo "<button class='approve-btn' data-id='".$list['id']."' hx-get='./filterContribution.php?id=".$list['id']."&status=approved&subject_id=".$list['subject_id']."' hx-target='#tbody-1' hx-swap='outerHTML'>Approve</button>";

                    echo "<button class='reject-btn' data-id='".$list['id']."' hx-get='./deleteContribution.php?id=".$list['id']."' hx-target='#tbody-1' hx-swap='outerHTML'>Reject</button>";
                }else{
                    echo "<button class='delete-btn' data-id='".$list['id']."' hx-get='./deleteContribution.php?id=".$list['id']."' hx-target='#tbody-1' hx-swap='outerHTML'>Delete</button>";
                }
                echo "</div>";
                echo "</td>";
            echo "</tr>";
    }
        echo "</tbody>";
    }

?>