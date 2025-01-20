<?php 
    require_once('../configs/config.php');
    require '../classes/User.php';
    $info = new User();
    session_start();
    if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
        header("Location:".BASE_PATH."/admin");
    }

    $username= $_GET['id'];
    $listRecord=$info->getData($username);

    // Split the name into first and last names
    $fullName = isset($listRecord['name']) ? $listRecord['name'] : '';
    $names = explode(' ', $fullName);
    $firstName = isset($names[0]) ? $names[0] : '';
    if (count($names) > 1) {
        $lastName = implode(' ', array_slice($names, 1));
    } else {
        $lastName = '';
    }    

    if(isset($_POST['submit'])){
        $updated=$info->update($_POST,$username);
        if($updated){
            header("Location:".BASE_PATH."/admin/users.php");
        }else{
            echo "<script>alert('User not updated')</script>";
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
                    <h2>Update User</h2>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" value="<?php echo htmlspecialchars($firstName);?>" required />
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" value="<?php echo htmlspecialchars($lastName);?>" required />
                        </div>
                        <!-- <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required />
                        </div> -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($listRecord['email']);?>" required />
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($listRecord['contact']);?>" required />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($listRecord['address']);?>" required />
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role">
                                <option value="admin" <?php if($listRecord['role'] == 'admin') echo 'selected';?>>Admin</option>
                                <option value="user" <?php if($listRecord['role'] == 'user') echo 'selected'; ?>>User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-primary" name="submit">Update</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>