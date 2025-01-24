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

    public function fullname($firstname, $lastname){
        $this->fullname = $firstname . " ". $lastname;
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
public function getAllCourses() {
    $query = $this->conn->prepare("SELECT course_id, course_name FROM course");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}





// Add this method to the Front class in front.php
// Add this method to the Front class in front.php
public function getNotes($courseId = null, $semester = null, $limit = 40) {
    $query = "SELECT sm.material_id, sm.course_id, sm.semester, sm.subject_id, sm.file_desc, sm.file_name, s.subject_name 
              FROM study_material sm
              JOIN subject s ON sm.subject_id = s.subject_id
              WHERE sm.material_type = 'Notes'"; // Only fetch materials of material_type 'notes'

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


// Add this method to the Front class in front.php
// Add this method to the Front class in front.php
public function getSyllabuses($courseId = null, $semester = null, $limit = 40) {
    $query = "SELECT sm.material_id, sm.course_id, sm.semester, sm.subject_id, sm.file_desc, sm.file_name, s.subject_name 
              FROM study_material sm
              JOIN subject s ON sm.subject_id = s.subject_id
              WHERE sm.material_type = 'Syllabus'"; // Only fetch materials of material_type 'notes'

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



// Add this method to the Front class in front.php
// Add this method to the Front class in front.php
public function getQuestionpapers($courseId = null, $semester = null, $limit = 40) {
    $query = "SELECT sm.material_id, sm.course_id, sm.semester, sm.subject_id, sm.file_desc, sm.file_name, s.subject_name 
              FROM study_material sm
              JOIN subject s ON sm.subject_id = s.subject_id
              WHERE sm.material_type = 'Old Questions'"; // Only fetch materials of material_type 'notes'

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




}
