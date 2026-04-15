<?php
require_once 'includes/header.php';
requireLogin();

$username = $_SESSION['username'];
$user     = &$_SESSION['users'][$username];

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current_password'] ?? '';
    $new     = $_POST['new_password'] ?? '';
    $retype  = $_POST['retype_password'] ?? '';

    if (!$current || !$new || !$retype) {
        $error = 'All fields are required.';
    } elseif ($user['password'] !== $current) {
        $error = 'Current password is incorrect.';
    } elseif ($new !== $retype) {
        $error = 'New passwords do not match.';
    } elseif (strlen($new) < 4) {
        $error = 'New password must be at least 4 characters.';
    } else {
        // Update password in session
        $user['password'] = $new;
        $success = 'Password changed successfully.';
    }
}
?>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="logo"><span>&#10004;</span> Company</div>
        <div class="nav-links">
            Logged in as <a href="view_profile.php"><?= htmlspecialchars($username) ?></a>
            <span>|</span>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content" style="padding:0;">
        <div class="dashboard-layout">

            <!-- Sidebar -->
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

            <!-- Main -->
            <div class="main-content">
                <?php if ($error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endif; ?>
                <?php if ($success): ?>
                    <p class="success"><?= $success ?></p>
                <?php endif; ?>

                <form method="POST" action="change_password.php">
                    <fieldset>
                        <legend>CHANGE PASSWORD</legend>
                        <br>

                        <div class="form-row">
                            <label>Current Password</label>
                            <span>&nbsp;:</span>&nbsp;
                            <input type="password" name="current_password">
                        </div>

                        <div class="form-row">
                            <label class="cp-new">New Password</label>
                            <span>&nbsp;:</span>&nbsp;
                            <input type="password" name="new_password">
                        </div>

                        <div class="form-row">
                            <label class="cp-retype">Retype New Password :</label>
                            <input type="password" name="retype_password">
                        </div>

                        <br>
                        <input type="submit" value="Submit">

                    </fieldset>
                </form>
            </div>

        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
