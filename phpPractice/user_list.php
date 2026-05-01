<?php
    session_start();
    if(!isset($_SESSION['status'])){
         header('location: login.html');
    }
    else{
        $users=[
                ['id'=>1, 'name'=>'alamin', 'email'=>'alamin@aiub.edu'],
                ['id'=>2, 'name'=>'xyz', 'email'=>'alamin@aiub.edu'],
                ['id'=>3, 'name'=>'abc', 'email'=>'alamin@aiub.edu'],
                ['id'=>4, 'name'=>'pqr', 'email'=>'alamin@aiub.edu'],
                ['id'=>5, 'name'=>'zzz', 'email'=>'alamin@aiub.edu']
                ];
    }
    $_SESSION['users']= $users;

?>

<html>
<head><title>User List Page</title></head>
<body>
    <a href="home.php">Back</a>
    <a href="logout.php">Logout</a>

    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php 
        foreach($users as $user){  
        ?>
        <tr>
            <td><?php echo $user['id']?></td>
            <td><?php echo $user['name']?></td>
            <td><?php echo $user['email']?></td>
            <td>
                <a href="edit.php?id=<?= $user['id']?>">Edit</a>
                <a href="delete.php?id=<?= $user['id']?>">Delete</a>
                <a href="details.php?id=<?= $user['id']?>">Details</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>