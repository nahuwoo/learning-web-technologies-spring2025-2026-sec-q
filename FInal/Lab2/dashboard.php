<?php
require_once 'includes/header.php';
requireLogin();

$username = $_SESSION['username'];
?>

    <div class="top-bar">
        <div class="logo"> Company</div>
        <div class="nav-links">
            Logged in as <a href="view_profile.php"><?= htmlspecialchars($username) ?></a>
            <span>|</span>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="content" style="padding:0;">
        <div class="dashboard-layout">

            <div class="sidebar">
                <h3>Account</h3>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="view_profile.php">View Profile</a></li>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="change_picture.php">Change Profile Picture</a></li>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

            <div class="main-content">
                <p><strong>Welcome <?= htmlspecialchars($username) ?></strong></p>
            </div>

        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
