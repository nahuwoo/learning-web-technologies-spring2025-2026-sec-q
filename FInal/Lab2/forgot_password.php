<?php
require_once 'includes/header.php';
redirectIfLoggedIn();

$message = '';
$is_error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (!$email) {
        $message = 'Please enter your email.';
        $is_error = true;
    } else {
        // Search all registered users for matching email
        $found = false;
        if (isset($_SESSION['users'])) {
            foreach ($_SESSION['users'] as $uname => $udata) {
                if ($udata['email'] === $email) {
                    // In a real app, you'd send an email.
                    // For this lab, we just display the password.
                    $message = 'Your password is: <strong>' . htmlspecialchars($udata['password']) . '</strong>';
                    $found = true;
                    break;
                }
            }
        }
        if (!$found) {
            $message = 'No account found with that email.';
            $is_error = true;
        }
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
        <?php if ($message): ?>
            <p class="<?= $is_error ? 'error' : 'success' ?>" style="text-align:center">
                <?= $message ?>
                <?php if (!$is_error): ?> &mdash; <a href="login.php">Go to Login</a><?php endif; ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="forgot_password.php">
            <fieldset>
                <legend>FORGOT PASSWORD</legend>
                <br>

                <div class="form-row">
                    <label>Enter Email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                </div>

                <input type="submit" value="Submit">

            </fieldset>
        </form>
    </div>

<?php require_once 'includes/footer.php'; ?>
