<?php
session_start();

$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $u = $_POST['username'];
    $e = $_POST['email'];
    $p = $_POST['password'];
    $cp = $_POST['confirm_password'];
    $g = $_POST['gender'];
    $dob = $_POST['dob'];

    if($p != $cp){
        $error = "Passwords do not match!";
    } else {
        $_SESSION['users'][$u] = [
            'email'=>$e,
            'password'=>$p,
            'gender'=>$g,
            'dob'=>$dob,
            'photo'=>''
        ];
        echo "Registered! <a href='login.php'>Login</a>";
    }
}
?>

<h2>Register</h2>

<form method="post">
Username: <input name="username" required><br>
Email: <input type="email" name="email" required><br>

Password: <input type="password" name="password" required><br>
Confirm Password: <input type="password" name="confirm_password" required><br>

Gender:
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female<br>

DOB: <input type="date" name="dob"><br>

<button>Register</button>
</form>

<?php echo $error; ?>