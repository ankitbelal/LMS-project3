<?php 
    require_once('../configs/config.php');
    session_start();
    if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
        header("Location:".BASE_PATH."/admin");
    }

    if(isset($_POST['submit'])){
        require '../classes/User.php';
        $createUser=new User();
        $created=$createUser->create($_POST);

        if($created){
            header("Location:".BASE_PATH."/admin/users.php");
        }else{
           echo("<script>alert('User not created')</script>");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/addUser.css">
    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
         <?php include_once('includes/sidebar.php'); ?>
        <div class="main-section">
            <!-- Right section at the top -->
            <?php include_once('includes/right.php'); ?>

            <!--MAIN SECTION-->
            <main>
                <!-- Add User Form (Hidden by Default) -->
                <div id="add-user-form" class="add-user-form">
                    <h2>Add User</h2>
                    <form method="POST" action="">
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
                        <button type="submit" class="btn-primary" name="submit">Add User</button>
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