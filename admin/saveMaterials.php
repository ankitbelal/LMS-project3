<?php 
    require_once('../classes/materialCRUD.php');
    require_once('../configs/config.php');
    // Get the ID from the query parameter
    session_start();
    // Check if the user is logged in and is an admin
    if (!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])) {
        http_response_code(403); // Forbidden
        echo "Unauthorized access.";
        exit();
    }
    $materialCRUD= new materialCRUD();
    $errors=[];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $subId=$_POST['subject-id'];
        $course_id=$_POST['course-id'];
        $subject_name=$materialCRUD->getOneSubject($course_id,$subId);

        // Validate subject name exists
        if (!$subject_name) {
            $errors[]="Invalid Subject";
            // die("<script>alert('Invalid subject'); window.history.back();</script>");
         }
        //handle file upload    
        if(
            isset($_FILES['file']) && $_FILES['file']['error']==UPLOAD_ERR_OK
        ){
            //add name of the upload directory and temp name to the file
            $uploadDir="../uploads/";//directory to store uploaded files

            // 1. Ensure upload directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

             // 2. Validate PDF extension
            $originalName = $_FILES['file']['name'];
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
             // 3. Validate MIME type (not just extension)
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($_FILES['file']['tmp_name']);
            
            if ($mime !== 'application/pdf') {
                $errors[]="Invalid file type -PDF required";
                // die("<script>alert('Invalid file type - PDF required'); window.history.back();</script>");
            }

                 // 4. Generate final filename
            $newFileName = $subject_name['subject_name'] . ".pdf";
            $newFilePath = $uploadDir . $newFileName;

            // 5. Check for existing file
            if (file_exists($newFilePath)) {
                $errors[]="File already exists for this subject";
                // die("<script>alert('File already exists for this subject'); window.history.back();</script>");
            }

            if(!empty($errors)){
                $_SESSION['form_errors']=$errors;
                die("<script> window.history.back();</script>");
                
            }

            //6. move the uploaded files
            if(move_uploaded_file($_FILES['file']['tmp_name'],$newFilePath)){
                $created=$materialCRUD->saveMaterials($_POST,$newFileName);
                if($created){
                    header("Location:".BASE_PATH."/admin/studyMaterial.php");
                    
                }else{
                    $_SESSION['form_errors']=["Failed to save datas"];
                    die("<script> window.history.back();</script>");
                    
                }
            }else{
                $_SESSION['form_errors']=["failed to upload file"];
                die("<script> window.history.back();</script>");
            
            }   
        }else{
            $_SESSION['form_errors']=["No file uploaded or file uploaded error"];
            die("<script> window.history.back();</script>");
        }
    }

?>