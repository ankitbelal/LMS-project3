<?php
// Start the session only if it is not already active
session_start();
if (!isset($_SESSION['from_register'])) {
    header("Location: login.php");
    exit();
}

require_once 'classes/front.php';
$front = new Front();

if (isset($_POST['verify'])) {
    $userOTP = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'];

    if ($front->verifyOTP($userOTP)) {
        // OTP is correct, proceed with registration
        $data = [
            'name' => $_SESSION['form_data']['firstname'] . " " . $_SESSION['form_data']['lastname'],
            'username' => $_SESSION['form_data']['username'],
            'address' => $_SESSION['form_data']['address'],
            'email' => $_SESSION['form_data']['email'],
            'contact' => $_SESSION['form_data']['contact'],
            'password' => md5($_SESSION['form_data']['password']),
            'role' => 'user'
        ];

        if ($front->register($data)) {
            $_SESSION['success'] = "Registered successfully!";
            unset($_SESSION['form_data']); // Clear session data
            unset($_SESSION['otp']); // Clear OTP from session
            header("Location: otp.php");
            exit();
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
            header("Location: otp.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid OTP. Please try again.";
        header("Location: otp.php");
        exit();
    }
}

// Handle Resend OTP
if (isset($_GET['resend'])) {
    $email = $_SESSION['form_data']['email']; // Get the email from session
    $otp = $front->generateOTP(); // Generate a new OTP
    $_SESSION['otp'] = $otp; // Store the new OTP in session

    // Send the new OTP via email
    if ($front->sendOTP($email, $otp)) {
        $_SESSION['success'] = "Resend OTP successfully!";
    } else {
        $_SESSION['error'] = "Failed to resend OTP. Please try again.";
    }

    header("Location: otp.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, rgb(85, 126, 202), rgb(215, 220, 229)); /* Gradient blue background */
            background-size: cover;
            background-position: center;
            user-select: none;
        }

        .wrapper {
            width: 90%;
            max-width: 450px; /* Increased wrapper size */
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
            border: 2px solid rgba(255, 255, 255, 0.2); /* Light border */
            backdrop-filter: blur(10px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Stronger shadow */
            color: #000;
            border-radius: 15px; /* Rounded corners */
            padding: 30px; /* Increased padding */
            margin: 50px auto 20px;
        }

        .wrapper h2 {
            font-size: 32px; /* Larger font size */
            text-align: center;
            color: #1e3c72; /* Dark blue text */
            margin-bottom: 20px;
        }

        .otp-instruction {
            text-align: center;
            color: #555;
            font-size: 14px;
            margin: 10px 0;
        }

        .otp-boxes {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 20px auto;
        }

        .otp-boxes input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            outline: none;
            background: transparent;
            color: #000;
        }

        .otp-boxes input:focus {
            border-color: rgba(0, 0, 0, 0.5);
        }

        .btn {
            width: 100%; /* Full width */
            height: 50px; /* Slightly taller button */
            background: linear-gradient(135deg, #1e3c72, #2a5298); /* Gradient blue button */
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-size: 16px;
            color: #fff; /* White text */
            font-weight: 600;
            display: block;
            margin: 20px auto;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: linear-gradient(135deg, #2a5298, #1e3c72); /* Reverse gradient on hover */
        }

        .resend-otp {
            text-align: center;
            margin: 15px 0 10px;
            color: #000;
        }

        .resend-otp a {
            color: #1e3c72; /* Dark blue link color */
            text-decoration: none;
            font-weight: 600;
        }

        .resend-otp a:hover {
            text-decoration: underline;
        }

        .additional-links {
            text-align: center;
            margin: 10px 0;
        }

        .additional-links a {
            color: #1e3c72; /* Dark blue link color */
            text-decoration: none;
            font-weight: 600;
            display: block;
            margin: 5px 0;
        }

        .additional-links a:hover {
            text-decoration: underline;
        }

        /* Message styling */
        .message {
            color: white; /* White text for better contrast */
            text-align: center;
            margin-bottom: 15px;
            padding: 10px; /* Add padding for better appearance */
            border-radius: 5px; /* Rounded corners */
            display: none; /* Initially hidden */
            margin-top: 10px;
        }

        /* Error message background color */
        .message.error {
            background-color: #ff4444; /* Red background for errors */
        }

        /* Success message background color */
        .message.success {
            background-color: #4CAF50; /* Green background for success */
        }

        .email-sent-success {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>OTP Verification</h2>

        <!-- Single message div for both error and success messages -->
        <div class="message" id="message">
            <?php if (isset($_SESSION['error'])): ?>
                <?php echo $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            <?php elseif (isset($_SESSION['success'])): ?>
                <?php echo $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
        </div>

        <p class="otp-instruction">We sent the code to you via email</p>
        <p class="otp-instruction">Enter that 5-digit code to verify</p>
        <form action="#" id="otp-form" method="POST">
            <div class="otp-boxes">
                <input type="text" name="otp1" maxlength="1" required>
                <input type="text" name="otp2" maxlength="1" required>
                <input type="text" name="otp3" maxlength="1" required>
                <input type="text" name="otp4" maxlength="1" required>
                <input type="text" name="otp5" maxlength="1" required>
            </div>
            <button type="submit" name="verify" class="btn">Verify OTP</button>
            <div class="additional-links">
                <a href="register.php">Change Email</a>
            </div>
            <div class="resend-otp">
                <p>Didn't receive the OTP? <a href="otp.php?resend=true">Resend OTP</a></p>
            </div>
            <div class="additional-links">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </div>

    <script>
        // JavaScript to handle error and success messages
        document.addEventListener('DOMContentLoaded', function() {
            var messageDiv = document.getElementById('message');

            // Check if the message div contains any content
            if (messageDiv && messageDiv.textContent.trim() !== '') {
                // Determine if it's an error or success message
                if (messageDiv.textContent.includes('Invalid')) {
                    messageDiv.classList.add('error'); // Add error class for red background
                } else {
                    messageDiv.classList.add('success'); // Add success class for green background
                }

                // Show the message div
                messageDiv.style.display = 'block';

                // Hide the message after 5 seconds
                setTimeout(function() {
                    messageDiv.style.display = 'none';
                }, 3000); // 5 seconds

                // Redirect to login.php only if the message is "Registered successfully!"
                if (messageDiv.textContent.includes("Registered successfully!")) {
                    setTimeout(function() {
                        window.location.href = 'login.php'; // Redirect to login.php
                        unset($_SESSION['from_login']); // Unset the session variable
                    }, 1000); // 1 second
                }
            }
        });

        // JavaScript to handle OTP input
        const otpForm = document.getElementById('otp-form');
        const messageBox = document.getElementById('message-box');

        function handleOTPInput() {
            const otpInputs = document.querySelectorAll('.otp-boxes input');

            otpInputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    const value = e.target.value;
                    if (!/^\d*$/.test(value)) {
                        e.target.value = value.replace(/\D/g, '');
                    }

                    if (value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && index > 0 && e.target.value === '') {
                        otpInputs[index - 1].focus();
                    }
                });
            });
        }

        handleOTPInput();
    </script>
</body>
</html>