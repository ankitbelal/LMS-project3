<?php
    session_start();
    require_once('../configs/Database.php');
    $db = new Database();
    $conn=$db->getConnection();
    if($_POST){
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        $result=$conn->prepare("select * from tbl_users where username=:username and password=:password");

        $result->bindParam(':username',$username);
        $result->bindParam(':password',$password);
        $result->execute();

        $data=$result->fetch(PDO::FETCH_ASSOC);

        if($result->rowCount()>0){
            if($data['role']=='admin'){
                $_SESSION['username']=$username;
                $_SESSION['is_admin']=true;
                header("Location:./index.php");
            }else{
                $_SESSION['username']=$username;
                $_SESSION['is_admin']=false;
                header("Location:./adminLogin.php");
            }
        }else{
            echo "<script>alert('Invalid Username or Password');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/loginStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>
<body>
    <div class="login-container">
        <!-- Common Container for All Forms -->
        <div id="form-container">
            <!-- Login Form -->
            <form class="login-form" id="login-form" method="POST"> 
                <h2>Admin Login</h2>
                <div class="input-field">
                    <span class="material-icons-sharp">person</span>
                    <input type="text" placeholder="Username" name="username" required />
                </div>
                <div class="input-field">
                    <span class="material-icons-sharp">lock</span>
                    <input type="password" id="password" placeholder="Password" name="password" required />
                    <i class="fa-solid fa-eye" id="show-password"></i>
                </div>
                <button type="submit" class="btn primary-btn">Login</button>
                <a href="#" class="forgot-password" id="forgot-password-link">Forgot Password?</a>
            </form>

            <!-- Email Submission Form -->
            <form class="login-form hidden" id="email-form">
                <h2>Forgot Password</h2>
                <div class="input-field">
                    <span class="material-icons-sharp">email</span>
                    <input type="email" id="email" placeholder="Enter your email" required />
                </div>
                <button type="submit" class="btn primary-btn">Submit</button>
                <a href="#" class="forgot-password" id="back-to-login">Back to Login</a>
            </form>

            <!-- OTP Submission Form -->
            <form class="login-form hidden" id="otp-form">
                <h2>Enter OTP</h2>
                <div class="otp-inputs">
                    <input type="text" maxlength="1" class="otp-box" />
                    <input type="text" maxlength="1" class="otp-box" />
                    <input type="text" maxlength="1" class="otp-box" />
                    <input type="text" maxlength="1" class="otp-box" />
                    <input type="text" maxlength="1" class="otp-box" />
                </div>
                <p id="otp-error" class="error-message hidden">Invalid OTP. Please try again.</p>
                <button type="submit" class="btn primary-btn">Verify OTP</button>
                <a href="#" class="forgot-password" id="back-to-email">Back to Email</a>
            </form>

            <!-- Change Password Form -->
            <form class="login-form hidden" id="change-password-form">
                <h2>Change Password</h2>
                <div class="input-field">
                    <span class="material-icons-sharp">lock</span>
                    <input type="password" id="old-password" placeholder="Old Password" required />
                    <i class="fa-solid fa-eye" id="show-old-password"></i>
                </div>
                <div class="input-field">
                    <span class="material-icons-sharp">lock</span>
                    <input type="password" id="new-password" placeholder="New Password" required />
                    <i class="fa-solid fa-eye" id="show-new-password"></i>
                </div>
                <div class="input-field">
                    <span class="material-icons-sharp">lock</span>
                    <input type="password" id="confirm-password" placeholder="Confirm Password" required />
                    <i class="fa-solid fa-eye" id="show-confirm-password"></i>
                </div>
                <button type="submit" class="btn primary-btn">Change Password</button>
                <a href="#" class="forgot-password" id="back-to-otp">Back to OTP</a>
            </form>
        </div>
    </div>

    <script>
        // Common Variables
        const loginForm = document.getElementById('login-form');
        const emailForm = document.getElementById('email-form');
        const otpForm = document.getElementById('otp-form');
        const changePasswordForm = document.getElementById('change-password-form');
        const formContainer = document.getElementById('form-container');
        const forgotPasswordLink = document.getElementById('forgot-password-link');
        const backToLoginLink = document.getElementById('back-to-login');
        const backToEmailLink = document.getElementById('back-to-email');
        const backToOtpLink = document.getElementById('back-to-otp');
        const otpInputs = document.querySelectorAll('.otp-box');
        const otpError = document.getElementById('otp-error');

        // Show Email Form
        forgotPasswordLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginForm.classList.add('hidden');
            emailForm.classList.remove('hidden');
        });

        // Show Login Form
        backToLoginLink.addEventListener('click', (e) => {
            e.preventDefault();
            emailForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        });

        // Show Email Form from OTP Form
        backToEmailLink.addEventListener('click', (e) => {
            e.preventDefault();
            otpForm.classList.add('hidden');
            emailForm.classList.remove('hidden');
        });

        // Show OTP Form from Change Password Form
        backToOtpLink.addEventListener('click', (e) => {
            e.preventDefault();
            changePasswordForm.classList.add('hidden');
            otpForm.classList.remove('hidden');
        });

        // Email Form Submission
        emailForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('email').value;
            if (email) {
                // Simulate sending OTP to email
                alert(`OTP sent to ${email}`);
                emailForm.classList.add('hidden');
                otpForm.classList.remove('hidden');
            }
        });

        // OTP Form Submission
        otpForm.addEventListener('submit', (e) => {
            e.preventDefault();
            let otp = '';
            otpInputs.forEach(input => {
                otp += input.value;
            });

            // Mock OTP Verification
            const validOTP = "12345"; // Replace with actual OTP validation logic
            if (otp === validOTP) {
                otpError.classList.add('hidden'); // Hide error message
                otpForm.classList.add('hidden');
                changePasswordForm.classList.remove('hidden'); // Show Change Password Form
            } else {
                otpError.classList.remove('hidden'); // Show error message
            }
        });

        // Auto-focus on next OTP box
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus(); // Move to next box
                }
            });

            // Shift focus backward on Backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    otpInputs[index - 1].focus(); // Move to previous box
                }
            });
        });

        // Hide/Show Password for Login Form
        const showPassword = document.querySelector("#show-password");
        const passwordField = document.querySelector("#password");
        showPassword.addEventListener("click", function () {
            togglePasswordVisibility(passwordField, showPassword);
        });

        // Hide/Show Password for Change Password Form
        const showOldPassword = document.querySelector("#show-old-password");
        const oldPasswordField = document.querySelector("#old-password");
        showOldPassword.addEventListener("click", function () {
            togglePasswordVisibility(oldPasswordField, showOldPassword);
        });

        const showNewPassword = document.querySelector("#show-new-password");
        const newPasswordField = document.querySelector("#new-password");
        showNewPassword.addEventListener("click", function () {
            togglePasswordVisibility(newPasswordField, showNewPassword);
        });

        const showConfirmPassword = document.querySelector("#show-confirm-password");
        const confirmPasswordField = document.querySelector("#confirm-password");
        showConfirmPassword.addEventListener("click", function () {
            togglePasswordVisibility(confirmPasswordField, showConfirmPassword);
        });

        // Function to toggle password visibility
        function togglePasswordVisibility(inputField, icon) {
            if (inputField.type === "password") {
                inputField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
                icon.style.color = "#7380ec";
            } else {
                inputField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        // // Login Form Submission
        // loginForm.addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     const username = document.querySelector('.input-field input[type="text"]').value;
        //     const password = document.querySelector('.input-field input[type="password"]').value;
        //     if (username === 'admin' && password === 'password123') {
        //         alert('Login Successful!');
        //         window.location.href = './index.php'; // Redirect to admin dashboard
        //     } else {
        //         alert('Invalid Username or Password');
        //     }
        // });
    </script>
</body>
</html>