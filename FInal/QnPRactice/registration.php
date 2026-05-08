<html>
<head><title>Registration</title></head>
<body>  

    <form method="post" enctype="multipart/form-data" action="showdata.php">
        <fieldset>
            <legend>REGISTRATION</legend>
            First Name: <input type="text" name="first_name" value=""><br>
            Last Name: <input type="text" name="last_name" value=""><br>
            Date Of Birth: <input type="date" name="dob" value=""><br>
            Gender:
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female
            <input type="radio" name="gender" value="Other">Other<br>

            Contact: <input type="text" name="contact" value=""><br>
            Email: <input type="text" name="email" value=""><br>
            Username: <input type="text" name="username" value=""><br>
            Password: <input type="password" name="password" value=""><br>
            Confirm Password: <input type="password" name="confirm_password" value=""><br>

            <input type="submit" name="submit" value="submit">
            <input type="reset" name="reset" value="reset">

        </fieldset>
    </form>

</body>
</html>