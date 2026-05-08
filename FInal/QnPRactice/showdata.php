<?php
    if(!isset($_REQUEST['submit'])){
        echo "Please submit the form first";
    }
    else{
        $first_name= $_REQUEST['first_name'];
        $last_name= $_REQUEST['last_name'];
        $dob=$_REQUEST['dob'];
        $contact= $_REQUEST['contact'];
        $email= $_REQUEST['email'];
        $gender= $_REQUEST['gender'];
        $password= $_REQUEST['password'];
        $confirm_password= $_REQUEST['confirm_password'];

        if($first_name=="" ||  $last_name=="" || $dob=="" || $contact=="" ||  
        $email=="" || $gender=="" ||  $password=="" || $confirm_password==""){
                echo "Please Enter Allt the values!";
            }
        else{
            $user=[$first_name,$last_name,$dob,$contact,$email,$gender,$password,$confirm_password];
            foreach($user as $key=>$value){
                echo $key.": ".$value. "<br>";
            }
            print_r($user) ;

        }
    }
?>