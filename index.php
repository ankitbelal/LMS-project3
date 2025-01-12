<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>


<body>

<header>
<h2 class="logo">
    <img src="./images/logo.png" alt="Logo">
</h2>
    
    <nav class="navigation">
        <a href="dashboard.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="Contact.php">Contact</a>
        <button class="btnlogin">login</button>
    </nav>
</header>

<div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
    
    <div class="formbox login">
        <h2>Login</h2>
        <form action="login.php" method="post">
        <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <div class="inputbox">
                <input type="Email" placeholder="" required>
                <label>Email</label>
            </div>
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <div class="inputbox">
              
                <input type="password" placeholder="" required >
                <label >Password</label>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>


            </div>
            <button type="submit" class="btn">Login</button>

            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link" >Register</a></p>
            </div>
    </div>
    








    <div class="formbox register">
        <h2>Registration</h2>
        <form action="login.php" method="post">
        <span class="icon"><ion-icon name="person"></ion-icon></span>
            <div class="inputbox">
              
                <input type="text" placeholder="" required>
                <label>Username</label>
            </div>


            <span class="icon"><ion-icon name="mail"></span>
            <div class="inputbox">
              
                <input type="Email" placeholder="" required>
                <label>Email</label>
            </div>

            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <div class="inputbox">
              
                <input type="password" placeholder="" required >
                <label >Password</label>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">I agree with terms and conditions</label>
                


            </div>
            <button  class="btn" type="button">Register</button>

            <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link" >Login</a></p>

            </div>
    </div>
</div>





    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>







</body>
</html>

