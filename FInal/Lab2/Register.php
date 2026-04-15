<?php
require_once 'includes/header.php';
redirectIfLoggedIn(); // Already logged in? Go to dashboard

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';
    $gender   = $_POST['gender'] ?? '';
    $dob_d    = trim($_POST['dob_d'] ?? '');
    $dob_m    = trim($_POST['dob_m'] ?? '');
    $dob_y    = trim($_POST['dob_y'] ?? '');

    // Basic validation
    if (!$name || !$email || !$username || !$password || !$confirm || !$gender || !$dob_d || !$dob_m || !$dob_y) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (isset($_SESSION['users'][$username])) {
        // Check if username already exists in session storage
        $error = 'Username already taken.';
    } else {
        // DOB formatting
        $dob = sprintf('%02d/%02d/%04d', $dob_d, $dob_m, $dob_y);

        // Store user in $_SESSION['users'] array (keyed by username)
        $_SESSION['users'][$username] = [
            'name'     => $name,
            'email'    => $email,
            'username' => $username,
            'password' => $password, // NOTE: In real apps, use password_hash()
            'gender'   => $gender,
            'dob'      => $dob,
            'picture'  => '', // No picture yet
        ];

        $success = 'Registration successful! <a href="login.php">Login here</a>.';
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
        <?php if ($success): ?>
            <p class="success" style="text-align:center"><?= $success ?></p>
        <?php else: ?>
        <form method="POST" action="register.php">
            <fieldset>
                <legend>REGISTRATION</legend>
                <br>

                <div class="form-row">
                    <label>Name</label>
                    <span>:</span>&nbsp;
                    <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                </div>

                <div class="form-row">
                    <label>Email</label>
                    <span>:</span>&nbsp;
                    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    &nbsp;<strong>i</strong>
                </div>

                <div class="form-row">
                    <label>User Name</label>
                    <span>:</span>&nbsp;
                    <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                </div>

                <div class="form-row">
                    <label>Password</label>
                    <span>:</span>&nbsp;
                    <input type="password" name="password">
                </div>

                <div class="form-row">
                    <label>Confirm Password</label>
                    <span>:</span>&nbsp;
                    <input type="password" name="confirm_password">
                </div>

                <!-- Gender -->
                <fieldset style="margin-bottom:10px;">
                    <legend>Gender</legend>
                    <label><input type="radio" name="gender" value="Male"
                        <?= (($_POST['gender'] ?? '') === 'Male') ? 'checked' : '' ?>> Male</label>
                    &nbsp;
                    <label><input type="radio" name="gender" value="Female"
                        <?= (($_POST['gender'] ?? '') === 'Female') ? 'checked' : '' ?>> Female</label>
                    &nbsp;
                    <label><input type="radio" name="gender" value="Other"
                        <?= (($_POST['gender'] ?? '') === 'Other') ? 'checked' : '' ?>> Other</label>
                </fieldset>

                <!-- Date of Birth -->
                <fieldset style="margin-bottom:15px;">
                    <legend>Date of Birth</legend>
                    <div class="dob-row">
                        <input type="text" name="dob_d" placeholder="DD" maxlength="2"
                            value="<?= htmlspecialchars($_POST['dob_d'] ?? '') ?>" style="width:40px;">
                        /
                        <input type="text" name="dob_m" placeholder="MM" maxlength="2"
                            value="<?= htmlspecialchars($_POST['dob_m'] ?? '') ?>" style="width:40px;">
                        /
                        <input type="text" name="dob_y" placeholder="YYYY" maxlength="4"
                            value="<?= htmlspecialchars($_POST['dob_y'] ?? '') ?>" style="width:60px;">
                        <span class="dob-hint">(dd/mm/yyyy)</span>
                    </div>
                </fieldset>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">

            </fieldset>
        </form>
        <?php endif; ?>
    </div>

<?php require_once 'includes/footer.php'; ?>
