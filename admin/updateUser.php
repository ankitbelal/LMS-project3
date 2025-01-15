<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/updateUser.css" />

    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
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
                <div class="update-form-container">
                    <form class="update-form">
                        <h2>Update User Profile</h2>

                        <div class="input-group">
                            <div class="input-field">
                                <span class="material-icons-sharp">badge</span>
                                <input type="text" placeholder="First Name" required />
                            </div>
                            <div class="input-field">
                                <span class="material-icons-sharp">badge</span>
                                <input type="text" placeholder="Last Name" required />
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <span class="material-icons-sharp">person</span>
                                <input type="text" placeholder="Username" required />
                            </div>
                            <div class="input-field">
                                <span class="material-icons-sharp">mail</span>
                                <input type="email" placeholder="Email" required />
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <span class="material-icons-sharp">phone</span>
                                <input type="text" placeholder="Contact" required />
                            </div>
                            <div class="input-field">
                                <span class="material-icons-sharp">home</span>
                                <input type="text" placeholder="Address" required />
                            </div>
                        </div>

                        <button type="submit" class="btn primary-btn">Update</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>