<?php
session_start();
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
            header('Location: login.php');
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
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .wrapper {
            width: 90%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000;
            border-radius: 10px;
            padding: 20px;
        }

        .wrapper h2 {
            font-size: 28px;
            text-align: center;
            color: #000;
        }

        .input-box {
            position: relative;
            width: 80%;
            margin: 20px auto;
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
            border-bottom-color: rgba(0, 0, 0, 0.5);
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
            color: rgba(0, 0, 0, 0.8);
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
            width: 80%;
            height: 45px;
            background: #000;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            display: block;
            margin: 20px auto;
        }

        .login-register {
            text-align: center;
            margin: 15px 0 10px;
            color: #000;
        }

        .login-register a {
            color: #000;
            text-decoration: none;
            font-weight: 600;
        }

        .login-register a:hover {
            text-decoration: underline;
        }

        .error-label {
            display: none;
            width: 80%;
            margin: 10px auto;
            padding: 10px;
            background-color: #ff4444;
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
                padding: 15px;
            }

            .wrapper h2 {
                font-size: 24px;
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

            .login-register {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .wrapper {
                width: 95%;
            }

            .wrapper h2 {
                font-size: 20px;
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
                    <p>Remember your password? <a href="#" id="login-link-4">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // Hide the error message after 3 seconds
        const errorMessageBox = document.querySelector('.error-label');
        if (errorMessageBox) {
            setTimeout(() => {
                errorMessageBox.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>