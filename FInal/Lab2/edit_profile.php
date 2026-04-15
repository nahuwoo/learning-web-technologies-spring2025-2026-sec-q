<?php
require_once 'includes/header.php';
requireLogin();

$username = $_SESSION['username'];
$user     = &$_SESSION['users'][$username]; 

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = trim($_POST['name'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $dob    = trim($_POST['dob'] ?? '');

    if (!$name || !$email || !$gender || !$dob) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } else {
        $user['name']   = $name;
        $user['email']  = $email;
        $user['gender'] = $gender;
        $user['dob']    = $dob;
        $success = 'Profile updated successfully.';
    }
}

$cur = $user;
?>

    <div class="top-bar">
        <div class="logo"><span>&#10004;</span> Company</div>
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
                <?php if ($error): ?>
                    <p class="error"><?= $error ?></p>
                <?php endif; ?>
                <?php if ($success): ?>
                    <p class="success"><?= $success ?></p>
                <?php endif; ?>

                <form method="POST" action="edit_profile.php">
                    <fieldset>
                        <legend>EDIT PROFILE</legend>
                        <br>

                        <div class="form-row">
                            <label>Name</label>
                            <span>:</span>&nbsp;
                            <input type="text" name="name"
                                value="<?= htmlspecialchars($_POST['name'] ?? $cur['name']) ?>">
                        </div>

                        <div class="form-row">
                            <label>Email</label>
                            <span>:</span>&nbsp;
                            <input type="email" name="email"
                                value="<?= htmlspecialchars($_POST['email'] ?? $cur['email']) ?>">
                            &nbsp;<strong>i</strong>
                        </div>

                        <div class="form-row">
                            <label>Gender</label>
                            <span>:</span>&nbsp;
                            <?php $g = $_POST['gender'] ?? $cur['gender']; ?>
                            <label><input type="radio" name="gender" value="Male"
                                <?= $g === 'Male' ? 'checked' : '' ?>> Male</label>
                            &nbsp;
                            <label><input type="radio" name="gender" value="Female"
                                <?= $g === 'Female' ? 'checked' : '' ?>> Female</label>
                            &nbsp;
                            <label><input type="radio" name="gender" value="Other"
                                <?= $g === 'Other' ? 'checked' : '' ?>> Other</label>
                        </div>

                        <div class="form-row" style="flex-direction:column; align-items:flex-start;">
                            <label>Date of Birth</label>
                            <div style="display:flex; align-items:center; gap:5px;">
                                <span>:</span>
                                <input type="text" name="dob"
                                    value="<?= htmlspecialchars($_POST['dob'] ?? $cur['dob']) ?>"
                                    style="width:110px;">
                                <span class="dob-hint">(dd/mm/yyyy)</span>
                            </div>
                        </div>

                        <br>
                        <input type="submit" value="Submit">

                    </fieldset>
                </form>
            </div>

        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
