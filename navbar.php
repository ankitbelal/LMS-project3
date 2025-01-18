<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Responsive Navbar</title>
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
                <button class="user-icon" onclick="window.location.href='#'">
                    <div class="user-icon-circle">
                        <i class="fas fa-user"></i>
                    </div>
                </button>
                <span class="user-status" id="user-status">Not Signed In</span>
            </div>
        </nav>
    </div>
</header>

<script>
    const mobileMenu = document.getElementById('mobile-menu');
    const navWrapper = document.querySelector('.nav-wrapper');
    const closeBtn = document.getElementById('close-btn');
    const userStatus = document.getElementById('user-status');

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

    // Simulate login status (replace with actual login logic)
    const isLoggedIn = true; // Change to false if the user is not logged in
    if (isLoggedIn) {
        userStatus.innerHTML = "Status: Active<span class='tick-mark'>✓</span>";
        userStatus.style.color = "#28a745"; // Green color for active status
    } else {
        userStatus.textContent = "Not Signed In";
        userStatus.style.color = "#333333"; // Black color for not signed in
    }
</script>
</body>
</html>