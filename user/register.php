<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
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

        <label> <input type="checkbox" name="" id="">I, here by declare that the above information 
    provided is true and correct</label>
        <button type="submit" class ="btn">Register</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
        
    </form>

    </div>
</body>
</html>