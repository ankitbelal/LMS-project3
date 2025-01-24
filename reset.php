<?php
// Start the session only if it is not already active


// Rest of your existing code...
include_once('classes/front.php');
$front = new Front();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-new-password'];

    if ($newPassword !== $confirmPassword) {
        $_SESSION['error'] = 'Passwords do not match. Please try again.';
    } else {
        $data = [
            'email' => $_SESSION['email'],
            'password' => md5($newPassword)
        ];

        if ($front->resetPassword($data)) {
            $_SESSION['success'] = 'Password reset successfully!';
            header('Location: reset.php');
            exit();
        } else {
            $_SESSION['error'] = 'Failed to reset password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        /* Success message styling */
        .success-label {
            display: none;
            width: 100%; /* Full width */
            margin: 10px auto;
            padding: 10px;
            background-color: #4CAF50; /* Green background for success */
            color: #fff;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Error message styling */
        .error-label {
            display: none;
            width: 100%; /* Full width */
            margin: 10px auto;
            padding: 10px;
            background-color: #ff4444; /* Red background for errors */
            color: #fff;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
        }

        .password-error {
            color: #ff4444;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

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
        <!-- Reset Password Form -->
        <div class="formbox reset-password active">
            <h2>Reset Password</h2>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="success-label"><?php echo $_SESSION['success']; ?></div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-label"><?php echo $_SESSION['error']; ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <form action="reset.php" method="POST">
                <div class="input-box">
                    <input type="password" id="new-password" name="new-password" required placeholder=" ">
                    <label for="new-password" class="input-label">New Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <div class="password-error" id="new-password-error">
                        Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character.
                    </div>
                </div>
                <div class="input-box">
                    <input type="password" id="confirm-new-password" name="confirm-new-password" required placeholder=" ">
                    <label for="confirm-new-password" class="input-label">Confirm New Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                </div>
                <button type="submit" class="btn">Reset Password</button>
                <div class="login-register">
                    <p>Remember your password? <a href="login.php" id="login-link-4">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // Handle success message
        const successMessageBox = document.querySelector('.success-label');
        if (successMessageBox) {
            successMessageBox.style.display = 'block';
            setTimeout(() => {
                successMessageBox.style.display = 'none';
                

                window.location.href = 'login.php';
                unset($_SESSION['success']); // Redirect to login page after 1 second
            }, 1000);
        }

        // Handle error message
        const errorMessageBox = document.querySelector('.error-label');
        if (errorMessageBox) {
            errorMessageBox.style.display = 'block';
            setTimeout(() => {
                errorMessageBox.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>
