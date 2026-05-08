<?php
    require_once('../model/user_model.php');

    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $user = ['username' => $username,'password' => $password];
    if(login($user)==false){
        echo "invalid password";
    }
    else{
        session_start();
        $_SESSION['user']=$user;
        header('location: ../view/dashboard.php');
    }

?>
