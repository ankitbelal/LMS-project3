<?php 
    session_start();
    require_once('../configs/config.php');
    unset($_SESSION['username']);
    unset($_SESSION['is_admin']);
    header("Location:".BASE_PATH."/admin/index.php");
    exit();
?>