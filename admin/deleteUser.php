<?php
    require_once('../configs/config.php');
    require '../classes/User.php';
    $info= new User();
    session_start();
    if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
        header("Location:".BASE_PATH."/admin");
    }

    $username=$_GET['id'];
    $deleted=$info->delete($username);
    if($deleted){
        header("Location:".BASE_PATH."/admin/users.php");
    }else{
        echo("<script>alert('User not deleted')</script>");
    }
    
?>
