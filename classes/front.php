<?php
include_once('./configs/Database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Front
{
    public $connection;
    public $conn;
    public $otp;

    public function __construct()
    {
        $this->connection = new Database();
        $this->conn = $this->connection->getConnection();
    }

    public function fullname($firstname, $lastname)
    {
        $this->fullname = $firstname . " " . $lastname;
        return $this->fullname;
    }

    // Method to check if email already exists
    public function isEmailRegistered($email)
    {
        $query = $this->conn->prepare("SELECT username FROM tbl_users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->rowCount() > 0;
    }

    // Method to register user
    public function register($data)
    {
        $query = $this->conn->prepare("INSERT INTO tbl_users(name, username, email, contact, address, password, role) VALUES (:name, :username, :email, :contact, :address, :password, :role)");
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':username', $data['username']);
        $query->bindParam(':email', $data['email']);
        $query->bindParam(':contact', $data['contact']);
        $query->bindParam(':address', $data['address']);
        $query->bindParam(':password', $data['password']);
        $query->bindParam(':role', $data['role']);
        return $query->execute();
    }

    // Method to generate OTP
    public function generateOTP()
    {
        $this->otp = rand(10000, 99999);
        $_SESSION['otp'] = $this->otp; // Store OTP in session
        return $this->otp;
    }

    // Method to send OTP
    public function sendOTP($email)
    {
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        require 'phpmailer/Exception.php';

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ankitswarswati@gmail.com';
            $mail->Password = 'icmkcnoguqxkrwhd';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom($email, 'AnyNotes');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = 'Your Email Verification code is ' . $this->generateOTP();

            $mail->send();
            return true;
        } catch (Exception $e) {
            throw new Exception("Failed to send OTP: " . $e->getMessage());
        }
    }

    // Method to verify OTP
    public function verifyOTP($userOTP)
    {
        return $userOTP == $_SESSION['otp'];
    }

    // Method to reset password
    public function resetPassword($data)
    {
        $query = $this->conn->prepare("UPDATE tbl_users SET password = :password WHERE email = :email");
        $query->bindParam(':email', $data['email']);
        $query->bindParam(':password', $data['password']);
        return $query->execute();
    }

    // Method to fetch all courses
    public function getCourseId()
    {
        $query = $this->conn->prepare("SELECT course_id FROM course");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch the number of semesters for a specific course
    public function getSemestersByCourse($courseId)
    {
        $query = $this->conn->prepare("SELECT total_semester FROM course WHERE course_id = :course_id");
        $query->bindParam(':course_id', $courseId);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total_semester'] : 0; // Return total_semester or 0 if not found
    }

    // Method to fetch subjects based on course and semester
    public function getSubjects($courseId = null, $semester = null, $limit = 40)
    {
        $query = "SELECT s.subject_name, s.subject_id, s.semester, c.course_name 
                  FROM subject s 
                  JOIN course c ON s.course_id = c.course_id";

        if ($courseId) {
            $query .= " WHERE s.course_id = :course_id";
        }

        if ($semester) {
            $query .= $courseId ? " AND s.semester = :semester" : " WHERE s.semester = :semester";
        }

        if (!$courseId && !$semester) {
            $query .= " ORDER BY RAND() LIMIT :limit";
        }

        $stmt = $this->conn->prepare($query);

        if ($courseId) {
            $stmt->bindParam(':course_id', $courseId);
        }

        if ($semester) {
            $stmt->bindParam(':semester', $semester);
        }

        if (!$courseId && !$semester) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch all courses from the database
    public function getAllCourses()
    {
        $query = $this->conn->prepare("SELECT course_id, course_name FROM course");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch notes
    public function getNotes($courseId = null, $semester = null, $limit = 40)
    {
        $query = "SELECT sm.material_id, sm.course_id, sm.semester, sm.subject_id, sm.file_desc, sm.file_name, s.subject_name 
                  FROM study_material sm
                  JOIN subject s ON sm.subject_id = s.subject_id
                  WHERE sm.material_type = 'Notes'";

        if ($courseId) {
            $query .= " AND sm.course_id = :course_id";
        }

        if ($semester) {
            $query .= " AND sm.semester = :semester";
        }

        if (!$courseId && !$semester) {
            $query .= " ORDER BY RAND() LIMIT :limit";
        }

        $stmt = $this->conn->prepare($query);

        if ($courseId) {
            $stmt->bindParam(':course_id', $courseId);
        }

        if ($semester) {
            $stmt->bindParam(':semester', $semester);
        }

        if (!$courseId && !$semester) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch syllabuses
    public function getSyllabuses($courseId = null, $semester = null, $limit = 40)
    {
        $query = "SELECT sm.material_id, sm.course_id, sm.semester, sm.subject_id, sm.file_desc, sm.file_name, s.subject_name 
                  FROM study_material sm
                  JOIN subject s ON sm.subject_id = s.subject_id
                  WHERE sm.material_type = 'Syllabus'";

        if ($courseId) {
            $query .= " AND sm.course_id = :course_id";
        }

        if ($semester) {
            $query .= " AND sm.semester = :semester";
        }

        if (!$courseId && !$semester) {
            $query .= " ORDER BY RAND() LIMIT :limit";
        }

        $stmt = $this->conn->prepare($query);

        if ($courseId) {
            $stmt->bindParam(':course_id', $courseId);
        }

        if ($semester) {
            $stmt->bindParam(':semester', $semester);
        }

        if (!$courseId && !$semester) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch question papers
    public function getQuestionpapers($courseId = null, $semester = null, $limit = 40)
    {
        $query = "SELECT sm.material_id, sm.course_id, sm.semester, sm.subject_id, sm.file_desc, sm.file_name, s.subject_name 
                  FROM study_material sm
                  JOIN subject s ON sm.subject_id = s.subject_id
                  WHERE sm.material_type = 'Old Questions'";

        if ($courseId) {
            $query .= " AND sm.course_id = :course_id";
        }

        if ($semester) {
            $query .= " AND sm.semester = :semester";
        }

        if (!$courseId && !$semester) {
            $query .= " ORDER BY RAND() LIMIT :limit";
        }

        $stmt = $this->conn->prepare($query);

        if ($courseId) {
            $stmt->bindParam(':course_id', $courseId);
        }

        if ($semester) {
            $stmt->bindParam(':semester', $semester);
        }

        if (!$courseId && !$semester) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     // Method to set "Remember Me" cookie
     public function setRememberMeCookie($email)
     {
         // Generate a unique token
         $token = bin2hex(random_bytes(64)); // Secure random token
         $expiry = time() + (30 * 24 * 60 * 60); // 30 days from now
 
         // Store the token in the database
         $query = $this->conn->prepare("UPDATE tbl_users SET remember_token=:token, remember_token_expiry=:expiry WHERE email=:email");
         $query->bindParam(':token', $token);
         $query->bindParam(':expiry', date('Y-m-d H:i:s', $expiry));
         $query->bindParam(':email', $email);
         $query->execute();
 
         // Set a secure cookie with the token
         setcookie('remember_me', $token, $expiry, "/", "", true, true); // Secure and HTTP-only cookie
     }
 
     // Method to validate "Remember Me" cookie
     public function validateRememberMeCookie()
     {
         if (isset($_COOKIE['remember_me'])) {
             $token = $_COOKIE['remember_me'];
 
             // Fetch the user associated with the token
             $query = $this->conn->prepare("SELECT email, name FROM tbl_users WHERE remember_token=:token AND remember_token_expiry > NOW()");
             $query->bindParam(':token', $token);
             $query->execute();
 
             $data = $query->fetch(PDO::FETCH_ASSOC);
 
             if ($data) {
                 // Log the user in automatically
                 $_SESSION['username'] = $data['name'];
                 $_SESSION['is_user'] = true;
                 $_SESSION['email'] = $data['email']; // Store email in session for future use
                 return true;
             } else {
                 // Invalid or expired token, clear the cookie
                 $this->clearRememberMeCookie();
             }
         }
 
         return false;
     }
 
     // Method to clear "Remember Me" cookie
     public function clearRememberMeCookie()
     {
         if (isset($_COOKIE['remember_me'])) {
             $token = $_COOKIE['remember_me'];
 
             // Remove the token from the database
             $query = $this->conn->prepare("UPDATE tbl_users SET remember_token=NULL, remember_token_expiry=NULL WHERE remember_token=:token");
             $query->bindParam(':token', $token);
             $query->execute();
 
             // Clear the cookie
             setcookie('remember_me', '', time() - 3600, "/");
         }
     }


    public function getContributionsByUser($userEmail) 
{
    $query = "SELECT 
                c.course_name,
                co.semester,
                s.subject_name,
                co.content_type,
                co.uploaded_at,
                co.file_name,
                co.status
              FROM 
                contribution co
              JOIN 
                course c ON co.course_id = c.course_id
              JOIN 
                subject s ON co.subject_id = s.subject_id
              WHERE 
                co.email = :email"; // Filter by user's email

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 


public function uploadFile($file, $courseId, $semester, $subjectId, $resourceType, $description, $email)
{
    // Validate file upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("File upload error: " . $file['error']);
    }

    // Fetch subject name based on subject ID
    $query = $this->conn->prepare("SELECT subject_name FROM subject WHERE subject_id = :subject_id");
    $query->bindParam(':subject_id', $subjectId);
    $query->execute();
    $subject = $query->fetch(PDO::FETCH_ASSOC);

    if (!$subject) {
        throw new Exception("Subject not found.");
    }

    $subjectName = $subject['subject_name'];

    // Generate a unique file name
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newFileName = "{$courseId}_{$semester}_{$subjectName}_{$resourceType}.{$fileExtension}";
    $newFileName = str_replace(' ', '_', $newFileName); // Replace spaces with underscores

    // Define the upload directory
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }
    $uploadPath = $uploadDir . $newFileName;

    // Move the uploaded file to the uploads folder
    if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
        throw new Exception("Failed to move uploaded file.");
    }

    // Insert file details into the database
    $query = $this->conn->prepare("
        INSERT INTO contribution 
        (course_id, semester, subject_id, content_type, description, file_name, email, uploaded_at, status) 
        VALUES 
        (:course_id, :semester, :subject_id, :content_type, :description, :file_name, :email, NOW(), 'pending')
    ");

    $query->bindParam(':course_id', $courseId);
    $query->bindParam(':semester', $semester);
    $query->bindParam(':subject_id', $subjectId);
    $query->bindParam(':content_type', $resourceType);
    $query->bindParam(':description', $description);
    $query->bindParam(':file_name', $newFileName); // Save the new file name
    $query->bindParam(':email', $email);
   

    if (!$query->execute()) {
        throw new Exception("Failed to insert file details into the database.");
    }

    return $newFileName; // Return the new file name for reference
}

}