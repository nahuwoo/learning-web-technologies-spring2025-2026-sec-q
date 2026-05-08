<?php
    require_once('../model/user_model.php');

    session_start();
    if(!isset($_REQUEST['submit'])){
        echo "Invalid! Fill the form first";
    }
    else{
        $name= $_REQUEST['name'];
        $email= $_REQUEST['email'];
        $username= $_REQUEST['username'];
        $password= $_REQUEST['password'];

        if($name=="" || $email=="" || $username=="" || $password=="" ){
            echo "invalid! Fill all the inptuts";
        }

        else{
            $user=['name'=>$name, 'email'=>$email, 'username'=>$username, 'password'=>$password];
            // $_SESSION['user']=$user;
            addUser($user);

            header('location: ../view/login.html');
        }
    }
?>