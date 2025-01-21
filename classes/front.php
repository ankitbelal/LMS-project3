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
        $query = $this->conn->prepare("SELECT username FROM tbl_users WHERE email=:email");
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->rowCount() > 0;
    }

    // Method to register user
    public function register($data)
    {
        $result = $this->conn->prepare("INSERT INTO tbl_users(name, username, email, contact, address, password, role) VALUES (:name, :username, :email, :contact, :address, :password, :role)");
        $result->bindParam(':name', $data['name']);
        $result->bindParam(':username', $data['username']);
        $result->bindParam(':address', $data['address']);
        $result->bindParam(':email', $data['email']);
        $result->bindParam(':contact', $data['contact']);
        $result->bindParam(':password', $data['password']);
        $result->bindParam(':role', $data['role']);
        return $result->execute();
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





    //this is the method to reset password
    public function resetPassword($data)
    {
        $query = $this->conn->prepare("UPDATE tbl_users SET password=:password WHERE email=:email");
        $query->bindParam(':email', $data['email']);
        $query->bindParam(':password', $data['password']);
        return $query->execute();
    }
  
}