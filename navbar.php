<?php
// Start the session only if it is not already active



// Check if the user is logged in
$isLoggedIn = isset($_SESSION['is_user']) && $_SESSION['is_user'];

// Get the username if logged in, otherwise set it to 'Login'
$username = $isLoggedIn && isset($_SESSION['username']) ? $_SESSION['username'] : 'Login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Responsive Navbar</title>
    <style>
        /* Additional styles for the dropdown */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 60px;
            right: 20px;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        /* Style for the user icon and login label */
        .user-icon {
            margin-right: -70px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .user-icon img {
            width: 24px;
            height: 24px;
            filter: invert(100%); /* Black icon */
        }

        .login-label {
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<header>
    <!-- Hamburger Menu (Dropdown Icon) -->
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>

    <!-- Logo and AnyNotes Label (Always visible) -->
    <div class="logo-container">
        <h2 class="logo">
            <img src="./images/logo.png" alt="Logo">
        </h2>
        <div class="anynotes-label">
            <span class="any">Any</span><span class="notes">Notes</span>
        </div>
    </div>
    
    <!-- Navigation Links -->
    <div class="nav-wrapper">
        <!-- Close Button -->
        <div class="close-btn" id="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <!-- AnyNotes Label (for small screens, hidden by default) -->
        <div class="anynotes-labels">
            <span class="any">Any</span><span class="notes">Notes</span>
        </div>
        <!-- Menu Label -->
        <div class="menu-label">Menu</div>
        <nav class="navigation" id="navigation">
            <button onclick="window.location.href='index.php'"><i class="fas fa-home"></i><span>Home</span></button>
            <button onclick="window.location.href='about.php'"><i class="fas fa-info-circle"></i><span>About</span></button>
            <button onclick="window.location.href='services.php'"><i class="fas fa-concierge-bell"></i><span>Services</span></button>
            <button onclick="window.location.href='Contact.php'"><i class="fas fa-envelope"></i><span>Contact</span></button>
            <div class="user-container">
                <div class="user-icon" id="userIcon">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User Icon">
                    <span class="login-label" id="loginLabel"><?php echo htmlspecialchars($username); ?></span>
                </div>
                <!-- Dropdown Menu (Only render if logged in) -->
                <?php if ($isLoggedIn): ?>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="#">My Profile</a>
                    <a href="#">Settings</a>
                    <a href="#" id="logoutButton">Logout</a>
                </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>

<script>
    const mobileMenu = document.getElementById('mobile-menu');
    const navWrapper = document.querySelector('.nav-wrapper');
    const closeBtn = document.getElementById('close-btn');
    const userIcon = document.getElementById('userIcon');
    const loginLabel = document.getElementById('loginLabel');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const logoutButton = document.getElementById('logoutButton');

    // Check if the user is logged in (using PHP session variable)
    const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

    // Toggle navigation bar on mobile menu click
    mobileMenu.addEventListener('click', () => {
        navWrapper.classList.toggle('active');
    });

    // Close navigation bar on close button click
    closeBtn.addEventListener('click', () => {
        navWrapper.classList.remove('active');
    });

    // Close navigation bar when clicking outside of it
    document.addEventListener('click', (event) => {
        if (!navWrapper.contains(event.target) && !mobileMenu.contains(event.target)) {
            navWrapper.classList.remove('active');
        }
    });

    // Handle user icon click
    userIcon.addEventListener('click', () => {
        if (isLoggedIn) {
            // Toggle dropdown menu if logged in
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        } else {
            // Redirect to login.php if not logged in
            window.location.href = 'login.php';
        }
    });

    // Handle logout (only if logged in)
    if (logoutButton) {
        logoutButton.addEventListener('click', () => {
            // Redirect to logout.php to handle logout logic
            window.location.href = 'logout.php';
        });
    }

    // Close dropdown when clicking outside
    window.addEventListener('click', (e) => {
        if (dropdownMenu && !e.target.closest('.user-container')) {
            dropdownMenu.style.display = 'none';
        }
    });
</script>
</body>
</html>