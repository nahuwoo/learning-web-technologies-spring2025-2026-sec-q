<?php
    require_once('../model/user_model.php');

    $users = getAllUser();
?>

<table border="1">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Username</th>
</tr>

<?php
    foreach($users as $user){
?>

<tr>
    <td><?php echo $user['ID']; ?></td>
    <td><?php echo $user['Name']; ?></td>
    <td><?php echo $user['Email']; ?></td>
    <td><?php echo $user['Username']; ?></td>
</tr>

<?php
    }
?>

</table>