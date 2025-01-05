<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Update</title>
    <link rel="stylesheet" href="./css/updateUser.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
    />
  </head>
  <body>
    <div class="update-container">
      <form class="update-form">
        <h2>Update User Profile</h2>

        <div class="input-field">
          <span class="material-icons-sharp">badge</span>
          <input type="text" placeholder="First Name" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">badge</span>
          <input type="text" placeholder="Last Name" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">person</span>
          <input type="text" placeholder="Username" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">mail</span>
          <input type="email" placeholder="Email" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">phone</span>
          <input type="text" placeholder="Contact" required />
        </div>

        <div class="input-field">
          <span class="material-icons-sharp">home</span>
          <input type="text" placeholder="Address" required />
        </div>

        <button type="submit" class="btn primary-btn">Update</button>
      </form>
    </div>
  </body>
</html>
