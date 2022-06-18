<?php

session_start();
require('nav.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =  $_POST['username'];
    $pass = $_POST['password'];
    require_once('Connection.php');
    $show = login($username, $pass);
    if($show) {
        $_SESSION['status'] = $show['status'];
        $_SESSION['username'] = $username;
        // echo 'login was succesfull';
        header('LOCATION:index.php');
    }
    else {
        echo "<script> alert('INVALID CREDENTIALS!! Please enter valid credentials.');</script>";
    }

}

?>
<div class="container">
    <form method='POST' action='login.php'>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>