<?php
    session_start();
    $users=$_SESSION['users'];
    $id=$_GET['id'];
    $user=[];
    foreach($users as $u){
        if($id==$u['id']){
            $user=$u;
        }
    }
?>
<html>
<head><title>EDIT PAGE</title></head>
<body>
    <h1>Edit User!</h1>
    <a href='user_list.php'>Back</a> |
    <a href='../controller/logout.php'>Logout</a>
    <form method="post" enctype="multipart/form-data">
        ID: <input type="text" name="id" readonly value=<?=  $user['id']?> > <br>
        Username: <input type="text" name="username" value=<?=  $user['name']?>> <br>
        Email: <input type="text" name="email" value=<?=  $user['email']?>> <br>
        
    </form>
</body>
</html>