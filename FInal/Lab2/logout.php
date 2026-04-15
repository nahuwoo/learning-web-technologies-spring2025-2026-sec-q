<?php
session_start();

// Destroy only the login session variable, keep users data
// (so registered users are not lost after logout)
$users = $_SESSION['users'] ?? [];

session_unset();
session_destroy();

// Restart session to preserve the users array
session_start();
$_SESSION['users'] = $users;

// Clear the "Remember Me" cookie on logout
setcookie('remembered_user', '', time() - 3600, '/');

header("Location: login.php");
exit();
?>
