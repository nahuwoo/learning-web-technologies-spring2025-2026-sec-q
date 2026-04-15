<?php
require_once 'includes/header.php';
// If logged in, show logged-in nav; otherwise public nav
?>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="logo"><span>&#10004;</span> Company</div>
        <div class="nav-links">
            <?php if (isLoggedIn()): ?>
                Logged in as <a href="view_profile.php"><?= htmlspecialchars($_SESSION['username']) ?></a>
                <span>|</span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="index.php">Home</a>
                <span>|</span>
                <a href="login.php">Login</a>
                <span>|</span>
                <a href="register.php">Registration</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <p><strong>Welcome to xCompany</strong></p>
    </div>

<?php require_once 'includes/footer.php'; ?>
