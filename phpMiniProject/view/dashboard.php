<?php
    session_start();
    if(!isset($_SESSION['user'])){
        echo "Login First!";
        exit();
    }
    $username=$_SESSION['user']['username'];

?>
    <html>
    <head><title>Dashboard</title></head>
    <body>
    <div id="container" style="font-family: 'Times New Roman', Times, serif;">
        <b style="font-size: 30; color: green;"> X Company</b>
        <div id="navigation" style="float: right">
        Logged in as <?php echo $username?>
        <a href="../controller/logout.php">Logout</a>
        </div>

        <hr>
            <a href="dashboard.php?page=view_users">View Users</a>
            <?php
            if(isset($_GET['page']) && $_GET['page'] == "view_users"){
                include("view_users.php");
            } else {
            echo "<h3>Welcome to Dashboard</h3>";
             }
            ?>

        <hr>

        <p align="center">Copyright (c) 2017</p>
        <hr>
    </div>
    </body>
    </html>