<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin dashboard</title>
    <!--STYLESHEET-->
    <!-- <link rel="stylesheet" href="./ustyles.css" /> -->
    <link rel="stylesheet" href="./css/userstyles.css">
    <!-- <link rel="stylesheet" href="./userStyle.css" /> -->

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
                <!-- Search and Filter Section -->
                <div class="search-filter">
                    <input type="text" id="search" placeholder="Search users..." />
                    <select id="filter">
                        <option value="all">All</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <button id="add-user-btn" class="btn-primary" onclick="window.location.href='./addUser.php'">Add User</button>
                </div>

                <div class="user-table">
                    <h2>Users</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Role
                                <th>Created_at</th>
                                <th>Edit | Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder rows -->
                            <tr>
                                <td>John Doe</td>
                                <td>j@ohndoe</td>
                                <td>johndoe@example.com</td>
                                <td>1234567890</td>
                                <td>123 Main Street</td>
                                <td>Admin</td>
                                <td>2021-09-01</td>
                                <td>
                                    <a href="./updateUser.php">Edit</a>
                                    |
                                    <a href="#">Delete</a>
                                </td>
                            </tr>

                            <tr>
                                <td>John Doe</td>
                                <td>@johndoe</td>
                                <td>johndoe@example.com</td>
                                <td>1234567890</td>
                                <td>123 Main Street</td>
                                <td>Admin</td>
                                <td>2021-09-01</td>
                                <td>
                                    <a href="./updateUser.php">Edit</a>
                                    |
                                    <a href="#">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>