<?php

    if(isset($_REQUEST['submit'])){
        $username = $_POST['username'];

        if($username == ""){
            echo "Invalid Username";

        }   
        else{
            echo "Username: ".$username;
        }
    }
    else{
        echo "Form shoul be submitted";
        }   


?>