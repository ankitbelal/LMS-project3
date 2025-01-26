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
    $status=$_GET['status'];
    $subject_id=$_GET['subject_id'];
    
    $Contribute=new Contribution();
    
    if($status=='approved'){
        $approved=$Contribute->updateStatus($id,$status);
        if($approved){
            $getApprovedData=$Contribute->getData();
            
        }
    }
?>