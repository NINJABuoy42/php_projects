<?php
require('nav.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    if (!empty(trim($username)) && !empty(trim($email)) && !empty(trim($pass)) && !empty(trim($confirm_pass))) {
        if ($pass != $confirm_pass) {
            echo '<script> alert("Password Mismatch, Please Enter same password!!");</script>';
        }
        else {

            require_once('Connection.php');
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO users VALUES('$username','$email','$pass', NULL);";
                mysqli_query($conn, $query);
                echo '<script> alert("You have been successfuly registered!!");</script>';
                // die;
            }
            else {
                echo '<script> alert("Its seems username already taken, Please enter differnt username");</script>';
                
            }
        }
        
    }
    else {
        echo '<script> alert("Empty field detected, Please Fill the fields properly!!");</script>';
    }
}
?>
<div class="container">
    <form method='POST' action='register.php'>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4"> Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="confirm_pass">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
</div>
</form>
</div>