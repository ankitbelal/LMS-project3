<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <div class="wrapper">
        <!-- Message Box -->
        <div class="message-box" id="message-box"></div>

        <!-- Login Form -->
        <div class="formbox login active">
            <h2>Login</h2>
            <!-- Error/Success Message -->
            <div class="message-box" id="login-message-box"></div>
            <form action="#" id="login-form">
                <div class="input-box">
                    <input type="email" id="login-email" required placeholder=" ">
                    <label for="login-email" class="input-label">Email</label>
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                </div>
                <div class="input-box">
                    <input type="password" id="login-password" required placeholder=" ">
                    <label for="login-password" class="input-label">Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#" id="forgot-password-link">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" id="register-link">Sign up</a></p>
                </div>
            </form>
        </div>

        <!-- Forgot Password Form -->
        <div class="formbox forgot-password">
            <h2>Forgot Password</h2>
            <p class="otp-instruction">Enter the registered email</p>
            <form action="#" id="forgot-password-form">
                <div class="input-box">
                    <input type="email" id="forgot-email" required placeholder=" ">
                    <label for="forgot-email" class="input-label">Email</label>
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                </div>
                <!-- Error message for unregistered email -->
                <div class="message-box" id="forgot-password-message-box"></div>
                <button type="submit" class="btn">Send OTP</button>
                <div class="login-register">
                    <p>Remember your password? <a href="#" id="login-link-2">Login</a></p>
                </div>
            </form>
        </div>

        <!-- Register Form -->
        <div class="formbox register">
            <h2>Register</h2>
            <form action="#" id="register-form">
                <div class="input-box">
                    <input type="text" id="firstname" required placeholder=" ">
                    <label for="firstname" class="input-label">First Name</label>
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                </div>
                <div class="input-box">
                    <input type="text" id="lastname" required placeholder=" ">
                    <label for="lastname" class="input-label">Last Name</label>
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                </div>
                <div class="input-box">
                    <input type="email" id="register-email" required placeholder=" ">
                    <label for="register-email" class="input-label">Email</label>
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                </div>
                <div class="input-box">
                    <input type="tel" id="contact" required placeholder=" ">
                    <label for="contact" class="input-label">Contact</label>
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                </div>
                <div class="input-box">
                    <input type="text" id="address" required placeholder=" ">
                    <label for="address" class="input-label">Address</label>
                    <span class="icon"><ion-icon name="home"></ion-icon></span>
                </div>
                <div class="input-box">
                    <input type="password" id="register-password" required placeholder=" ">
                    <label for="register-password" class="input-label">Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <div class="password-error" id="password-error">
                        Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character.
                    </div>
                </div>
                <div class="input-box">
                    <input type="password" id="confirm-password" required placeholder=" ">
                    <label for="confirm-password" class="input-label">Confirm Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                </div>
                <div class="terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree to the <a href="#">terms and conditions</a></label>
                </div>
                <!-- Message Box for Registration Form -->
                <div class="message-box" id="register-message-box"></div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" id="login-link-3">Login</a></p>
                </div>
            </form>
        </div>

        <!-- OTP Verification Form -->
        <div class="formbox otp-verification">
            <h2>OTP Verification</h2>
            
            <p class="otp-instruction">We sent the code to you via email</p>
            <p class="otp-instruction">Enter that 6-digit code to verify</p>
            <form action="#" id="otp-form">
                <div class="otp-boxes">
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                    <input type="text" maxlength="1" required>
                </div>
                <button type="submit" class="btn">Verify OTP</button>
                <div class="change-email">
                    <button type="button" id="change-email-button">Change Email</button>
                </div>
                <div class="resend-otp">
                    <p>Didn't receive the OTP? <a href="#">Resend OTP</a></p>
                </div>
            </form>
        </div>

        <!-- Reset Password Form -->
        <div class="formbox reset-password">
            <h2>Reset Password</h2>
            <form action="#" id="reset-password-form">
                <div class="input-box">
                    <input type="password" id="new-password" required placeholder=" ">
                    <label for="new-password" class="input-label">New Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <div class="password-error" id="new-password-error">
                        Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character.
                    </div>
                </div>
                <div class="input-box">
                    <input type="password" id="confirm-new-password" required placeholder=" ">
                    <label for="confirm-new-password" class="input-label">Confirm New Password</label>
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                </div>
                <div class="error-label" id="reset-error-label">
                    Passwords do not match. Please try again.
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
        // JavaScript to handle form toggling and validation

        const loginForm = document.querySelector('.formbox.login');
        const forgotPasswordForm = document.querySelector('.formbox.forgot-password');
        const registerForm = document.querySelector('.formbox.register');
        const otpForm = document.querySelector('.formbox.otp-verification');
        const resetPasswordForm = document.querySelector('.formbox.reset-password');

        const forgotPasswordLink = document.getElementById('forgot-password-link');
        const registerLink = document.getElementById('register-link');
        const loginLink2 = document.getElementById('login-link-2'); // Login link in forgot password form
        const loginLink3 = document.getElementById('login-link-3'); // Login link in register form
        const loginLink4 = document.getElementById('login-link-4'); // Login link in reset password form
        const changeEmailButton = document.getElementById('change-email-button'); // Change Email button in OTP form

        const forgotPasswordFormElement = document.getElementById('forgot-password-form');
        const registerFormElement = document.getElementById('register-form');
        const otpFormElement = document.getElementById('otp-form');
        const resetPasswordFormElement = document.getElementById('reset-password-form');
        const resetErrorLabel = document.getElementById('reset-error-label');
        const newPasswordError = document.getElementById('new-password-error');

        // Variable to track the previous form and OTP source
        let previousForm = null;
        let otpSource = null; // 'forgot' or 'register'

        // Function to show a specific form and hide others
        function showForm(form) {
            loginForm.classList.remove('active');
            forgotPasswordForm.classList.remove('active');
            registerForm.classList.remove('active');
            otpForm.classList.remove('active');
            resetPasswordForm.classList.remove('active');
            form.classList.add('active');
        }

        // Function to show messages in the message box
        function showMessage(message, type, messageBoxId = 'message-box') {
            const messageBox = document.getElementById(messageBoxId);
            messageBox.textContent = message;
            messageBox.className = `message-box ${type}`; // Add success or error class
            messageBox.style.display = 'block'; // Show the message box

            // Hide the message box after 3 seconds
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 3000);
        }

        // Function to handle OTP input
        function handleOTPInput() {
            const otpInputs = document.querySelectorAll('.otp-boxes input');

            otpInputs.forEach((input, index) => {
                // Restrict input to numbers only
                input.addEventListener('input', (e) => {
                    const value = e.target.value;
                    if (!/^\d*$/.test(value)) {
                        e.target.value = value.replace(/\D/g, ''); // Remove non-numeric characters
                    }

                    // Move to the next input if a digit is entered
                    if (value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                });

                // Move to the previous input on backspace
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && index > 0 && e.target.value === '') {
                        otpInputs[index - 1].focus();
                    }
                });
            });
        }

        // Call the function to handle OTP input
        handleOTPInput();

        // Event listeners for toggling forms
        forgotPasswordLink.addEventListener('click', (e) => {
            e.preventDefault();
            previousForm = forgotPasswordForm; // Set previous form
            otpSource = 'forgot'; // Set OTP source to 'forgot'
            showForm(forgotPasswordForm);
        });

        registerLink.addEventListener('click', (e) => {
            e.preventDefault();
            previousForm = registerForm; // Set previous form
            otpSource = 'register'; // Set OTP source to 'register'
            showForm(registerForm);
        });

        loginLink2.addEventListener('click', (e) => {
            e.preventDefault();
            showForm(loginForm);
        });

        loginLink3.addEventListener('click', (e) => {
            e.preventDefault();
            showForm(loginForm);
        });

        loginLink4.addEventListener('click', (e) => {
            e.preventDefault();
            showForm(loginForm);
        });

        // Change Email Button in OTP Form
        changeEmailButton.addEventListener('click', (e) => {
            e.preventDefault();
            if (previousForm) {
                showForm(previousForm); // Go back to the previous form
            } else {
                showForm(loginForm); // Default to login form if no previous form is set
            }
        });

        // Forgot Password Form Submission
        forgotPasswordFormElement.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent page reload

            const email = document.getElementById('forgot-email').value;

            // Simple email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showMessage('Please enter a valid email address.', 'error', 'forgot-password-message-box');
                return;
            }

            // Simulate checking if the email is registered
            const registeredEmails = ["test@example.com", "user@example.com"]; // Example registered emails
            if (!registeredEmails.includes(email)) {
                showMessage('This email is not registered.', 'error', 'forgot-password-message-box');
                return;
            }

            // Simulate sending OTP (replace with actual OTP sending logic)
            showMessage('OTP sent to your email successfully!', 'success', 'forgot-password-message-box');
            otpSource = 'forgot'; // Set OTP source to 'forgot'
            showForm(otpForm); // Show OTP form after sending OTP
        });

        // Register Form Submission
        registerFormElement.addEventListener('submit', (e) => {
            e.preventDefault();

            const email = document.getElementById('register-email').value;
            const password = document.getElementById('register-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const contact = document.getElementById('contact').value;

            // Simple email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showMessage('Please enter a valid email address.', 'error', 'register-message-box');
                return;
            }

            // Contact validation: Ensure it contains only numbers and is not empty
            const contactRegex = /^\d+$/; // Matches only digits
            if (!contactRegex.test(contact)) {
                showMessage('Contact number must contain only numbers.', 'error', 'register-message-box');
                return;
            }

            // Password validation
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(password)) {
                document.getElementById('password-error').style.display = 'block';
                showMessage('Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character.', 'error', 'register-message-box');
                return;
            } else {
                document.getElementById('password-error').style.display = 'none';
            }

            // Confirm password validation
            if (password !== confirmPassword) {
                showMessage('Passwords do not match.', 'error', 'register-message-box');
                return;
            }

            // If validation passes, show success message and redirect to OTP form
            showMessage('Verify your email', 'success', 'register-message-box');
            otpSource = 'register'; // Set OTP source to 'register'

            // Simulate a delay before redirecting to OTP form
            setTimeout(() => {
                showForm(otpForm);
            }, 2000); // Redirect after 2 seconds
        });

        // OTP Form Submission
        otpFormElement.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent page reload
            // Show success message after entering OTP
            showMessage('OTP sent to your email successfully!', 'success');
            // Get the OTP values from the input boxes
            const otpInputs = document.querySelectorAll('.otp-boxes input');
            let enteredOTP = '';
            otpInputs.forEach(input => {
                enteredOTP += input.value; // Concatenate the OTP digits
            });

            // Simulate the correct OTP (replace with actual OTP verification logic)
            const correctOTP = '123456'; // Example correct OTP

            if (enteredOTP === correctOTP) {
                // If OTP is correct
                if (otpSource === 'forgot') {
                    showMessage('Email verified successfully!', 'success');
                    showForm(resetPasswordForm); // Show reset password form after OTP verification
                } else if (otpSource === 'register') {
                    showMessage('Registered successfully!', 'success');
                    // Simulate a delay before redirecting to the login form
                    setTimeout(() => {
                        showForm(loginForm);
                    }, 2000); // Redirect after 2 seconds
                }
            } else {
                // If OTP is incorrect
                showMessage('Wrong OTP, verification unsuccessful.', 'error');
            }

            
        });

        // Reset Password Form Submission
        resetPasswordFormElement.addEventListener('submit', (e) => {
            e.preventDefault();

            const newPassword = document.getElementById('new-password').value;
            const confirmNewPassword = document.getElementById('confirm-new-password').value;

            // Password validation
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(newPassword)) {
                newPasswordError.style.display = 'block';
                showMessage('Password must be at least 8 characters long and contain at least one uppercase letter, one number, and one special character.', 'error');
                return;
            } else {
                newPasswordError.style.display = 'none';
            }

            // Confirm password validation
            if (newPassword !== confirmNewPassword) {
                resetErrorLabel.style.display = 'block';
                showMessage('Passwords do not match. Please try again.', 'error');
                return;
            }

            resetErrorLabel.style.display = 'none';
            showMessage('Password reset successful!', 'success');
            showForm(loginForm); // Redirect to login after reset
        });

        // Login Form Submission
        const loginFormElement = document.getElementById('login-form');
        const loginMessageBox = document.getElementById('login-message-box');

        loginFormElement.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent page reload

            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;

            // Simulate login validation (replace with actual validation logic)
            const validEmail = "test@example.com"; // Example valid email
            const validPassword = "password123"; // Example valid password

            if (email === validEmail && password === validPassword) {
                // If login is successful
                showLoginMessage('Login successful! Redirecting...', 'success');

                // Simulate a delay before redirecting (e.g., to a dashboard)
                setTimeout(() => {
                    window.location.href = "dashboard.html"; // Replace with your redirect URL
                }, 2000); // Redirect after 2 seconds
            } else {
                // If login fails
                showLoginMessage('Invalid credentials. Please try again.', 'error');
            }
        });

        // Function to show login messages
        function showLoginMessage(message, type) {
            loginMessageBox.textContent = message;
            loginMessageBox.className = `message-box ${type}`; // Add success or error class
            loginMessageBox.style.display = 'block'; // Show the message box

            // Hide the message box after 3 seconds (optional)
            setTimeout(() => {
                loginMessageBox.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>