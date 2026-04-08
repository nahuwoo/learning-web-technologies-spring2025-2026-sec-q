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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>Signin</legend>
                Username:   <input type="text" name="username" value=""> <br>
                            <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
</body>
</html>