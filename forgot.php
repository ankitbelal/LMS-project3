<?php
// Start the session only if it is not already active

if (isset($_POST['send_otp'])) {
    require 'classes/front.php'; // Ensure this path is correct
    $front = new Front();

    $email = $_POST['email'];

    // Check if email is registered
    if (!$front->isEmailRegistered($email)) {
        $_SESSION['error'] = "Email is not registered.";
    } else {
        // If email is registered, send OTP
        try {
            $front->sendOTP($email);
            $_SESSION['success'] = "OTP sent to your email.";
            $_SESSION['email'] = $email; // Store email in session for OTP verification
            header("Location: forgot.php"); // Redirect to OTP verification page
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = "Failed to send OTP. Please try again.";
        }
    }

    // Redirect back to the same page to display messages
    header("Location: forgot.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
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

        .input-box {
            position: relative;
            width: 100%; /* Full width */
            margin: 25px auto; /* Increased margin */
        }

        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 2px solid rgba(0, 0, 0, 0.2);
            font-size: 16px;
            color: #000;
            padding: 10px 30px 10px 0;
        }

        .input-box input:focus {
            border-bottom-color: #1e3c72; /* Dark blue border on focus */
        }

        .input-box .input-label {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: rgba(0, 0, 0, 0.5);
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .input-box input:focus ~ .input-label,
        .input-box input:not(:placeholder-shown) ~ .input-label {
            top: 0;
            font-size: 12px;
            color: #1e3c72; /* Dark blue label color */
        }

        .input-box .icon {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: rgba(0, 0, 0, 0.5);
            pointer-events: none;
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

        .login-register {
            text-align: center;
            margin-top: 15px; /* Adjusted margin */
            font-size: 14px;
        }

        .login-register a {
            color: #1e3c72; /* Dark blue link color */
            text-decoration: none;
            font-weight: 600;
        }

        .login-register a:hover {
            text-decoration: underline;
        }

        /* Message Box Styles */
        .message-box {
            width: 100%; /* Full width */
            margin: 10px auto;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
            display: block; /* Changed to block to ensure it's visible */
        }

        .message-box.error {
            background-color: #ff4444; /* Red background for errors */
            color: white;
        }

        .message-box.success {
            background-color: #4CAF50; /* Green background for success */
            color: white;
        }

        .otp-instruction {
            text-align: center;
            color: #555;
            font-size: 14px;
            margin: 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .wrapper {
                padding: 20px; /* Adjusted padding for smaller screens */
            }

            .wrapper h2 {
                font-size: 28px; /* Adjusted font size */
            }

            .input-box input {
                font-size: 14px;
            }

            .input-box .input-label {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .wrapper {
                width: 95%; /* Adjusted width for smaller screens */
            }

            .wrapper h2 {
                font-size: 24px; /* Adjusted font size */
            }

            .input-box input {
                padding: 8px 25px 8px 0;
            }

            .input-box .input-label {
                font-size: 12px;
            }

            .input-box .icon {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Forgot Password Form -->
        <div class="formbox">
            <h2>Forgot Password</h2>
            <p class="otp-instruction">Enter the registered email</p>
            <form action="forgot.php" method="POST">
                <div class="input-box">
                    <input type="email" id="forgot-email" name="email" placeholder=" " value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                    <label for="forgot-email" class="input-label">Email</label>
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                </div>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="message-box error"><?php echo $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="message-box success"><?php echo $_SESSION['success']; ?></div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <button type="submit" name="send_otp" class="btn">Send OTP</button>
                <div class="login-register">
                    <p>Back to <a href="login.php" id="login-link-2">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // Hide the error/success message after 3 seconds
        const messageBox = document.querySelector('.message-box');
        if (messageBox) {
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 3000);
        }

        // Redirect to OTP page if success message is shown
        const successMessageBox = document.querySelector('.message-box.success');
        if (successMessageBox) {
            setTimeout(() => {
                window.location.href = 'Fotp.php';
            }, 1000);
        }
    </script>
</body>
</html>