<?php
require_once 'includes/header.php';
redirectIfLoggedIn();

$error = '';

// Pre-fill username from cookie if "Remember Me" was used before
$remembered_username = $_COOKIE['remembered_user'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember_me']);

    if (!$username || !$password) {
        $error = 'Please enter username and password.';
    } elseif (!isset($_SESSION['users'][$username])) {
        $error = 'Username not found.';
    } elseif ($_SESSION['users'][$username]['password'] !== $password) {
        $error = 'Incorrect password.';
    } else {
        // Login success — store username in session
        $_SESSION['username'] = $username;

        // Handle "Remember Me" cookie
        if ($remember) {
            // Cookie lasts 30 days
            setcookie('remembered_user', $username, time() + (30 * 24 * 60 * 60), '/');
        } else {
            // Clear cookie if unchecked
            setcookie('remembered_user', '', time() - 3600, '/');
        }

        header("Location: dashboard.php");
        exit();
    }
}
?>

    <!-- TOP BAR -->
    <div class="top-bar">
        <div class="logo"><span>&#10004;</span> Company</div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <span>|</span>
            <a href="login.php">Login</a>
            <span>|</span>
            <a href="register.php">Registration</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <?php if ($error): ?>
            <p class="error" style="text-align:center"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <fieldset>
                <legend>LOGIN</legend>
                <br>

                <div class="form-row">
                    <label>User Name :</label>
                    <input type="text" name="username"
                        value="<?= htmlspecialchars($remembered_username) ?>">
                </div>

                <div class="form-row">
                    <label>Password &nbsp;:</label>
                    <input type="password" name="password">
                </div>

                <div style="margin-bottom:10px;">
                    <input type="checkbox" name="remember_me" id="remember_me"
                        <?= $remembered_username ? 'checked' : '' ?>>
                    <label for="remember_me">Remember Me</label>
                </div>

                <input type="submit" value="Submit">
                <a href="forgot_password.php" class="edit-link">Forgot Password?</a>

            </fieldset>
        </form>
    </div>

<?php require_once 'includes/footer.php'; ?>
