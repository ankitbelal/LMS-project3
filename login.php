
<?php
session_start();
require_once './configs/Database.php';
$db = new Database();
$conn = $db->getConnection();

if ($_POST) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

     $result=$conn->prepare("select * from tbl_users where email=:email and password=:password");
    $result->bindParam(':email', $email);
    $result->bindParam(':password', $password);
    $result->execute();

    $data = $result->fetch(PDO::FETCH_ASSOC);

    if ($result->rowCount() > 0) {
        if ($data['role'] == 'user') {
            $_SESSION['username'] = $username;
            $_SESSION['is_user'] = true;
            $_SESSION['success'] = "Logged in successfully";
            header("Location: login.php"); // Redirect back to show the success message
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid credentials";
        header("Location: login.php"); // Redirect back to the login page
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login Page</title>
    <style>
        /* CSS Styles */
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
            background: linear-gradient(135deg,rgb(85, 126, 202),rgb(215, 220, 229)); /* Gradient blue background */
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

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%; /* Full width */
            margin: 20px auto 15px; /* Adjusted margin */
            font-size: 14px;
        }

        .remember-forgot label {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #1e3c72; /* Dark blue text */
        }

        .remember-forgot a {
            color: #1e3c72; /* Dark blue link color */
            text-decoration: none;
            font-weight: 600;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
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

        .signup-link {
            text-align: center;
            margin-top: 15px; /* Adjusted margin */
            font-size: 14px;
        }

        .signup-link a {
            color: #1e3c72; /* Dark blue link color */
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
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
            background-color: #ff4d4d; /* Red background for errors */
        }

        /* Success message background color */
        .message.success {
            background-color: #4CAF50; /* Green background for success */
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
    <?php include('navbar.php'); ?>
   
    <div class="wrapper">
        <!-- Login Form -->
        <div class="formbox login active">
            <h2>Login</h2>
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
            <form action="" method="POST">
                <div class="input-box">
                    <input type="email" id="login-email" name="email" required placeholder="">
                    <label for="login-email" class="input-label">Email</label>
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                </div>
                <div class="input-box">
                    <input type="password" id="login-password" name="password" required placeholder="">
                    <label for="login-password" class="input-label">Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                    <a href="forgot.php">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="signup-link">
                    <p>Don't have an account? <a href="register.php">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // JavaScript to handle error and success messages
        document.addEventListener('DOMContentLoaded', function() {
            var messageDiv = document.getElementById('message');
            var loginForm = document.querySelector('form');

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
                }, 5000); // 5 seconds

                // Redirect to index.php if it's a success message
                if (messageDiv.classList.contains('success')) {
                    setTimeout(function() {
                        window.location.href = 'index.php'; // Redirect to index.php
                    }, 1000); // 1 second
                }
            }

            // Reset form fields after submission
            if (loginForm) {
                loginForm.addEventListener('submit', function() {
                    setTimeout(function() {
                        loginForm.reset(); // Reset the form fields
                    }, 0);
                });
            }

            // Reset form fields when leaving the page
            window.onbeforeunload = function() {
                if (loginForm) {
                    loginForm.reset(); // Reset the form fields
                }
            };
        });
    </script>
</body>
</html>