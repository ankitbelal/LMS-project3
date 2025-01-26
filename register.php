
<?php
// Start the session only if it is not already active


// Clear session data if the user navigates to the login page
if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    unset($_SESSION['form_data']);
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    require 'classes/front.php';
    $front = new Front();

    // Get form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $role = 'user';
    $name = $front->fullname($firstname, $lastname);

    // Check if email already exists in the database
    if ($front->isEmailRegistered($email)) {
        $_SESSION['error'] = "Email already registered.";
        header("Location: register.php");
        exit();
    }
  
    // Validate password and confirm password
    elseif ($password !== $confirm_password) {
        $_SESSION['error'] = "Password and Confirm Password do not match.";
        header("Location: register.php");
        exit();
    }
    // Validate password strength
    elseif (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/', $password)) {
        $_SESSION['error'] = "Password must contain at least one number, one capital letter, one special character, and be at least 8 characters long";
        header("Location: register.php");
        exit();
    } else {
        // If validation passes, proceed with sending OTP
        try {
            $front->sendOTP($email);
            $_SESSION['success'] = "Please verify your email.";
            $_SESSION['form_data'] = $_POST; // Store form data in session
            header("Location: register.php");
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = "Failed to Send Email. Please try again.";
            header("Location: register.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
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

        .terms {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px 0;
        }

        .terms label {
            margin-left: 10px;
        }

        .terms a {
            text-decoration: none;
            color: inherit;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .message {
            color: white;
            text-align: center;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            display: none;
            margin-top: 10px;
        }

        .message.error {
            background-color: #ff4444; /* Red background for errors */
        }

        .message.success {
            background-color: #4CAF50; /* Green background for success */
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="wrapper">
        <h2>Register</h2>
        <form id="register-form" method="POST" action="">
            <div class="input-box">
                <input type="text" id="firstname" name="firstname" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['firstname']) ? $_SESSION['form_data']['firstname'] : ''; ?>">
                <label class="input-label">First Name</label>
                <span class="icon"><ion-icon name="person"></ion-icon></span>
            </div>

            <div class="input-box">
                <input type="text" id="lastname" name="lastname" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['lastname']) ? $_SESSION['form_data']['lastname'] : ''; ?>">
                <label class="input-label">Last Name</label>
                <span class="icon"><ion-icon name="person"></ion-icon></span>
            </div>

            <div class="input-box">
                <input type="text" id="username" name="username" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['username']) ? $_SESSION['form_data']['username'] : ''; ?>">
                <label for="username" class="input-label">Username</label>
                <span class="icon"><ion-icon name="person"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="email" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : ''; ?>">
                <label for="email" class="input-label">Email</label>
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="tel" id="contact" name="contact" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['contact']) ? $_SESSION['form_data']['contact'] : ''; ?>">
                <label for="contact" class="input-label">Contact</label>
                <span class="icon"><ion-icon name="call"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="text" id="address" name="address" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : ''; ?>">
                <label for="address" class="input-label">Address</label>
                <span class="icon"><ion-icon name="home"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : ''; ?>">
                <label for="password" class="input-label">Password</label>
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="password" id="confirm_password" name="confirm_password" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['confirm_password']) ? $_SESSION['form_data']['confirm_password'] : ''; ?>">
                <label for="confirm_password" class="input-label">Confirm Password</label>
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            </div>
            <div class="terms">
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree to the <a href="#">terms and conditions</a></label>
            </div>

            <div class="message" id="message">
                <?php if (isset($_SESSION['error'])): ?>
                    <?php echo $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']); ?>
                <?php elseif (isset($_SESSION['success'])): ?>
                    <?php echo $_SESSION['success']; ?>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
            </div>
            <button type="submit" name="submit" value="register" class="btn">Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="register.php?clear=true" id="login-link">Login</a></p>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var messageDiv = document.getElementById('message');

            if (messageDiv && messageDiv.textContent.trim() !== '') {
                if (messageDiv.textContent.includes('Invalid') || messageDiv.textContent.includes('failed')
                || messageDiv.textContent.includes('match') 
                || messageDiv.textContent.includes('registered')
                || messageDiv.textContent.includes('Password')
                || messageDiv.textContent.includes('Send')) {
                    messageDiv.classList.add('error');
                } else {
                    messageDiv.classList.add('success');
                }

                messageDiv.style.display = 'block';

                setTimeout(function() {
                    messageDiv.style.display = 'none';
                }, 3000);

                if (messageDiv.classList.contains('success')) {
                    setTimeout(function() {
                        window.location.href = 'otp.php';
                    }, 1000);
                }
            }
        });
    </script>
</body>
=======
<?php
session_start(); // Start the session

// Clear session data if the user navigates to the login page
if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    unset($_SESSION['form_data']);
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    require 'classes/front.php';
    $front = new Front();

    // Get form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $role = 'user';
    $name = $front->fullname($firstname, $lastname);

    // Check if email already exists in the database
    if ($front->isEmailRegistered($email)) {
        $_SESSION['error'] = "Email already registered.";
        header("Location: register.php");
        exit();
    }
  
    // Validate password and confirm password
    elseif ($password !== $confirm_password) {
        $_SESSION['error'] = "Password and Confirm Password do not match.";
        header("Location: register.php");
        exit();
    }
    // Validate password strength
    elseif (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/', $password)) {
        $_SESSION['error'] = "Password must contain at least one number, one capital letter, one special character, and be at least 8 characters long";
        header("Location: register.php");
        exit();
    } else {
        // If validation passes, proceed with sending OTP
        try {
            $front->sendOTP($email);
            $_SESSION['success'] = "Please verify your email.";
            $_SESSION['form_data'] = $_POST; // Store form data in session
            header("Location: register.php");
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = "Failed to Send Email. Please try again.";
            header("Location: register.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
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
            background: #f0f0f0;
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
            margin: 20px auto;
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

        .terms {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px 0;
        }

        .terms label {
            margin-left: 10px;
        }

        .terms a {
            text-decoration: none;
            color: inherit;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .message {
            color: white;
            text-align: center;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            display: none;
            margin-top: 10px;
        }

        .message.error {
            background-color: red;
        }

        .message.success {
            background-color: green;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="wrapper">
        <h2>Register</h2>
        <form id="register-form" method="POST" action="">
            <div class="input-box">
                <input type="text" id="firstname" name="firstname" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['firstname']) ? $_SESSION['form_data']['firstname'] : ''; ?>">
                <label class="input-label">First Name</label>
                <span class="icon"><ion-icon name="person"></ion-icon></span>
            </div>

            <div class="input-box">
                <input type="text" id="lastname" name="lastname" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['lastname']) ? $_SESSION['form_data']['lastname'] : ''; ?>">
                <label class="input-label">Last Name</label>
                <span class="icon"><ion-icon name="person"></ion-icon></span>
            </div>

            <div class="input-box">
                <input type="text" id="username" name="username" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['username']) ? $_SESSION['form_data']['username'] : ''; ?>">
                <label for="username" class="input-label">Username</label>
                <span class="icon"><ion-icon name="person"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="email" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : ''; ?>">
                <label for="email" class="input-label">Email</label>
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="tel" id="contact" name="contact" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['contact']) ? $_SESSION['form_data']['contact'] : ''; ?>">
                <label for="contact" class="input-label">Contact</label>
                <span class="icon"><ion-icon name="call"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="text" id="address" name="address" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : ''; ?>">
                <label for="address" class="input-label">Address</label>
                <span class="icon"><ion-icon name="home"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : ''; ?>">
                <label for="password" class="input-label">Password</label>
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            </div>
            <div class="input-box">
                <input type="password" id="confirm_password" name="confirm_password" required placeholder=" " value="<?php echo isset($_SESSION['form_data']['confirm_password']) ? $_SESSION['form_data']['confirm_password'] : ''; ?>">
                <label for="confirm_password" class="input-label">Confirm Password</label>
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            </div>
            <div class="terms">
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree to the <a href="#">terms and conditions</a></label>
            </div>

            <div class="message" id="message">
                <?php if (isset($_SESSION['error'])): ?>
                    <?php echo $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']); ?>
                <?php elseif (isset($_SESSION['success'])): ?>
                    <?php echo $_SESSION['success']; ?>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
            </div>
            <button type="submit" name="submit" value="register" class="btn">Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="register.php?clear=true" id="login-link">Login</a></p>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var messageDiv = document.getElementById('message');

            if (messageDiv && messageDiv.textContent.trim() !== '') {
                if (messageDiv.textContent.includes('Invalid') || messageDiv.textContent.includes('failed')
                || messageDiv.textContent.includes('match') 
                || messageDiv.textContent.includes('registered')
                || messageDiv.textContent.includes('Password')
                || messageDiv.textContent.includes('Send')) {
                    messageDiv.classList.add('error');
                } else {
                    messageDiv.classList.add('success');
                }

                messageDiv.style.display = 'block';

                setTimeout(function() {
                    messageDiv.style.display = 'none';
                }, 3000);

                if (messageDiv.classList.contains('success')) {
                    setTimeout(function() {
                        window.location.href = 'otp.php';
                    }, 1000);
                }
            }
        });
    </script>
</body>
</html>