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
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/logo.png" />
                    <h2>ANY <span class="danger">NOTES</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp"> close </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="./index.php"><span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./users.php"><span class="material-icons-sharp"> person_outline</span>
                    <h3>Users</h3>
                </a>
                <a href="./studyMaterial.php">
                    <span class="material-icons-sharp">library_books</span>
                    <h3>Study Materials</h3>
                </a>
                <a href=""><span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href=""><span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">36</span>
                </a>

                <a href=""><span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                </a>
                <a href=""><span class="material-icons-sharp">settings</span>
                    <h3>setting</h3>
                </a>
                <a href=""><span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
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