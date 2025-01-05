<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/loginStyle.css" />
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
          <input type="password" placeholder="Password" required />
        </div>
        <button type="submit" class="btn primary-btn">Login</button>
        <a href="#" class="forgot-password">Forgot Password?</a>
      </form>
    </div>
    <script>
        // Login Form Submission
document.querySelector('.login-form').addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Mock Admin Credentials
    const username = document.querySelector('.input-field input[type="text"]').value;
    const password = document.querySelector('.input-field input[type="password"]').value;
  
    if (username === 'admin' && password === 'password123') {
      alert('Login Successful!');
      window.location.href = './index.html'; // Redirect to admin dashboard
    } else {
      alert('Invalid Username or Password');
    }
  });
  
    </script>
  </body>
</html>
