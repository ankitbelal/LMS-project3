<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    
        
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
            </form>
    </div>
    





    <div class="reg">
      <form action="">
        <h1>Registration</h1>
        <div class="input-box">


            <div class="input-field">
                <input type="text" placeholder="Full Name" required>
                <i class='bx bxs-user'></i>
                
               
      </div>
      


           
            <div class="input-field">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
                
            </div>
         </div>

            <div class="input-box">
            <div class="input-field">
                <input type="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
                
            </div>

            <div class="input-field">
                <input type="Number" placeholder="Phone Number"  maxlength="10" required>
                <i class='bx bxs-phone'></i>
                
            </div>
            
        </div>



        <div class="input-box">
            <div class="input-field">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock'></i>
                
            </div>

            <div class="input-field">
                <input type="password" placeholder="Confirm Password" required>
                <i class='bx bxs-lock'></i> 
                
            </div>
            
        </div>

        <label> <input type="checkbox" name="" class="check" id="">I Here by declare that the above information 
        provided is true and correct</label>
        <button type="submit" class ="btn">Register</button>
        <p>Already have an account? <a href="#" class="login-link" >Login</a></p>
        
        </form>
</div>
   

           

           
    
</div>





    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>







</body>
</html>

