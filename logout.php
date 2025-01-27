<?php
session_start();

// Clear the session
session_unset();
session_destroy();

// Delete the persistent cookie
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, '/'); // Expire the cookie
}

header("Location: login.php"); // Redirect to the login page
exit();
?>