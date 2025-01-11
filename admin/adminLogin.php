<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/loginStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
      <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
    />
  </head>
  <body>
    <div class="login-container">
      <form class="login-form">
        <h2>Admin Login</h2>
        <div class="input-field">
          <span class="material-icons-sharp">person</span>
          <input type="text" placeholder="Username" required />
        </div>
        <div class="input-field">
          <span class="material-icons-sharp">lock</span>
          <input type="password" id="password" placeholder="Password" required />
          <i class="fa-solid fa-eye" id="show-password"></i>
        </div>
        <button type="submit" class="btn primary-btn">Login</button>
        <a href="#" class="forgot-password">Forgot Password?</a>
      </form>
    </div>
    <script>
        //hide show password
        const showPassword=document.querySelector("#show-password");
        const passwordField=document.querySelector("#password");
        showPassword.addEventListener("click",function(){
            if(passwordField.type==="password"){
                passwordField.type="text";
                showPassword.classList.remove("fa-eye");
                showPassword.classList.add("fa-eye-slash");
                showPassword.style.color="#7380ec";
            }else{
                passwordField.type="password";
                showPassword.classList.remove("fa-eye-slash");
                showPassword.classList.add("fa-eye");
            }
        })
        // Login Form Submission
document.querySelector('.login-form').addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Mock Admin Credentials
    const username = document.querySelector('.input-field input[type="text"]').value;
    const password = document.querySelector('.input-field input[type="password"]').value;
  
    if (username === 'admin' && password === 'password123') {
      alert('Login Successful!');
      window.location.href = './index.php'; // Redirect to admin dashboard
    } else {
      alert('Invalid Username or Password');
    }
  });
  
    </script>
  </body>
</html>
