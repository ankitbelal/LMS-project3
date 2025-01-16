<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin dashboard</title>
    <!--STYLESHEET-->
    <!-- <link rel="stylesheet" href="./ustyles.css" /> -->
    <link rel="stylesheet" href="./css/addUser.css">
    <!-- <link rel="stylesheet" href="./userStyle.css" /> -->

    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
         <?php include_once('includes/sidebar.php'); ?>
        <div class="main-section">
            <!-- Right section at the top -->
            <div class="right">
                <div class="top">
                    <!-- Menu button, theme toggler, and profile on the right -->
                    <div class="right-elements">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button>
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active">light_mode</span>
                            <span class="material-icons-sharp">dark_mode</span>
                        </div>
                        <div class="profile">
                            <div class="info">
                                <p>Hey, <b>Daniel</b></p>
                                <small class="text-muted">Admin</small>
                            </div>
                            <div class="profile-photo">
                                <span class="material-icons-sharp">
                                    account_circle
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--MAIN SECTION-->
            <main>
                <!-- Add User Form (Hidden by Default) -->
                <div id="add-user-form" class="add-user-form">
                    <h2>Add User</h2>
                    <form>
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" required />
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" required />
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="password-input-container">
                                <input type="password" id="password" name="password" required />
                                <span class="toggle-password material-icons-sharp" onclick="togglePasswordVisibility()">
                                    visibility_off
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required />
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact" name="contact" required />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" required />
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-primary">Add User</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
    <script>
        function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.textContent = 'visibility'; // Change icon to "visible"
    } else {
        passwordInput.type = 'password';
        toggleIcon.textContent = 'visibility_off'; // Change icon to "hidden"
    }
}
    </script>
</body>

</html>