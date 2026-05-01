<?php
    session_start();
    if(!isset($_SESSION['status'])){
        header('location: login.html');
    }

?>
<html>
<head><title>Home Page</title></head>
<body>
    <a href="user_list.php">User List</a>
    <a href="logout.php">Logout</a>
</body>
</html>