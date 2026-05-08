<?php
    //include_once('dba.php');
    require_once('db.php');


    function login($user){
        $con = getConnection();
        $sql = "select * from user where username='{$user['username']}' and password='{$user['password']}'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($user){
        $con = getConnection();
        $sql = "INSERT INTO `user`( `Name`, `Email`, `Username`, `Password`)
                 VALUES ('{$user['name']}','{$user['email']}','{$user['username']}','{$user['password']}')";
        $result = mysqli_query($con,$sql);

    }

    function deleteUser($id){

    }

    function updateUser($user){

    }

    function getAllUser(){
        $con = getConnection();
        $sql = "SELECT * FROM USER";
        $result = mysqli_query($con,$sql);

        $users = [];

    while($row = mysqli_fetch_assoc($result)){
        $users[] = $row;
    }
    return $users;
    }

?>