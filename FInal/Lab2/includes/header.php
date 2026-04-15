<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['username']);
}

// Redirect to login if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

// Redirect to dashboard if already logged in
function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>xCompany</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 14px; background: #f0f0f0; }

        /* Outer wrapper */
        .page-wrapper {
            width: 700px;
            margin: 20px auto;
            border: 1px solid #999;
            background: #fff;
        }

        /* Header bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid #ccc;
        }
        .logo { font-size: 22px; font-weight: bold; color: #333; }
        .logo span { color: green; font-size: 26px; }
        .nav-links a { color: purple; text-decoration: none; font-size: 13px; }
        .nav-links a:hover { text-decoration: underline; }
        .nav-links span { color: #333; margin: 0 3px; }

        /* Content area */
        .content { padding: 20px; min-height: 200px; }

        /* Footer */
        .footer {
            border-top: 1px solid #ccc;
            text-align: center;
            padding: 8px;
            font-size: 13px;
            color: #555;
        }

        /* Fieldset forms */
        fieldset {
            border: 1px solid #999;
            padding: 15px 20px;
            width: 420px;
            margin: 0 auto;
        }
        legend {
            font-weight: bold;
            padding: 0 5px;
        }
        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }
        .form-row label { width: 150px; }
        .form-row input[type="text"],
        .form-row input[type="email"],
        .form-row input[type="password"] {
            width: 170px;
            padding: 3px 5px;
            border: 1px solid #ccc;
        }
        .dob-row { display: flex; gap: 5px; align-items: center; }
        .dob-row input { width: 50px; padding: 3px 5px; border: 1px solid #ccc; }
        .dob-hint { color: #cc0000; font-size: 12px; font-style: italic; }

        input[type="submit"], button[type="submit"] {
            padding: 4px 14px;
            cursor: pointer;
            margin-right: 5px;
        }
        input[type="reset"] { padding: 4px 14px; cursor: pointer; }

        /* Error / success messages */
        .error { color: red; font-size: 13px; margin-bottom: 8px; }
        .success { color: green; font-size: 13px; margin-bottom: 8px; }

        /* Dashboard layout */
        .dashboard-layout {
            display: flex;
            gap: 0;
        }
        .sidebar {
            width: 180px;
            border-right: 1px solid #ccc;
            padding: 10px 15px;
        }
        .sidebar h3 { font-size: 14px; border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-bottom: 10px; }
        .sidebar ul { list-style: disc; padding-left: 18px; }
        .sidebar ul li { margin-bottom: 6px; }
        .sidebar ul li a { color: purple; text-decoration: none; font-size: 13px; }
        .sidebar ul li a:hover { text-decoration: underline; }
        .main-content { flex: 1; padding: 10px 20px; }

        /* Profile view */
        .profile-box { border: 1px solid #999; padding: 15px; position: relative; }
        .profile-box legend { font-weight: bold; }
        .profile-row { display: flex; margin-bottom: 8px; border-bottom: 1px solid #eee; padding-bottom: 6px; }
        .profile-row .label { width: 110px; font-weight: normal; }
        .profile-pic { position: absolute; top: 15px; right: 15px; }
        .profile-pic img { width: 70px; height: 70px; object-fit: cover; border-radius: 50%; }
        .profile-pic .default-pic {
            width: 70px; height: 70px;
            background: #333;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 30px;
        }
        a.edit-link { color: purple; text-decoration: none; font-size: 13px; }
        a.edit-link:hover { text-decoration: underline; }

        /* Change password color scheme from screenshot */
        .cp-new { color: green; }
        .cp-retype { color: red; }
    </style>
</head>
<body>
<div class="page-wrapper">
