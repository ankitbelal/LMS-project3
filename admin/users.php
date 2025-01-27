<?php
     require_once('../configs/config.php');
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }
     $username = $_SESSION['username'];
     require '../classes/User.php';
     $getInfo= new User();  
     $userData = $getInfo->getData($username);
     $listUser=$getInfo->list();
     //split full name into  first name
     $fullName = $userData['name'];
     $names = explode(' ', $fullName);
     $firstName = isset($names[0]) ? $names[0] : '';
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
        <?php include_once('includes/sidebar.php'); ?>
        <div class="main-section">
            <!-- Right section at the top -->
            
            <div class="right">
          <div class="top">
          <h1>Users</h1>
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
                  <p>Hey, <b><?php echo htmlspecialchars($firstName); ?></b></p>
                  <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                  <span class="material-icons-sharp">account_circle</span>
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
                                <th>SN</th>
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
                             <?php
                             $i=1;
                             foreach($listUser as $list){
                            ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $list['name'];?></td>
                                    <td><?php echo $list['username'];?></td>
                                    <td><?php echo $list['email'];?></td>
                                    <td><?php echo $list['contact'];?></td>
                                    <td><?php echo $list['address'];?></td>
                                    <td><?php echo $list['role'];?></td>
                                    <td><?php echo $list['created_at'];?></td>
                                    <td>
                                    <a href="./updateUser.php?id=<?php echo htmlspecialchars($list['username']);?>">Edit</a>
                                    |
                                    <a href="./deleteUser.php?id=<?php echo $list['username'];?>" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
                                    </td>
                                </tr>    
                             <?php $i++;}?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
    <script>
        // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

// Variables
const searchInput = document.getElementById('search');
const filterSelect = document.getElementById('filter');
const tbody = document.querySelector('.user-table tbody');

// Function to fetch and display data
function fetchData() {
    const searchTerm = searchInput.value;
    const filterValue = filterSelect.value;

    fetch('./searchUsers.php?term=' + encodeURIComponent(searchTerm) + '&filter=' + encodeURIComponent(filterValue))
        .then(response => response.json())
        .then(data => {
            tbody.innerHTML = '';
            if (data.length > 0) {
                data.forEach(function(user, index) {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${user.name}</td>
                        <td>${user.username}</td>
                        <td>${user.email}</td>
                        <td>${user.contact}</td>
                        <td>${user.address}</td>
                        <td>${user.role}</td>
                        <td>${user.created_at}</td>
                        <td>
                            <a href="./updateUser.php?id=${encodeURIComponent(user.username)}">Edit</a>
                            |
                            <a href="./deleteUser.php?id=${encodeURIComponent(user.username)}" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            } else {
                tbody.innerHTML = '<tr><td colspan="9">No results found.</td></tr>';
            }
        });
}

// Event listeners with debounce
searchInput.addEventListener('input', debounce(fetchData, 300));
filterSelect.addEventListener('change', fetchData);
    </script>
</body>

</html>