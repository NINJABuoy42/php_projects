<?php

use LDAP\Result;

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empName =  $_POST['emp_name'];
    $empAge =  $_POST['emp_age'];
    $empDesignation =  $_POST['emp_dsg'];
    $empSalary =  '$'.$_POST['emp_salary'];
    require_once('Connection.php');
    $result = addEmployee($empName,$empAge, $empDesignation,$empSalary);
    echo $result;
}
require('nav.php');
?>
<br/>
<form method="POST" action="add.php" class="container">
    <div class="row">

        <div class="col">
            <input type="text" class="form-control" id="emp_name" placeholder="ENTER NAME..." name="emp_name">
        </div>
        <div class="col">
            <input type="number" class="form-control" id="emp_age" placeholder="ENTER AGE" name="emp_age">
        </div>
        <div class="col">
            <input type="number" class="form-control" id="emp_salary" placeholder="ENTER SALARY" name="emp_salary">
        </div>
        <div class="col">
            <input type="text" class="form-control" id="emp_dsg" placeholder="ENTER DESIGNATION" name="emp_dsg">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary">ADD</button>
        </div>
        
    </div>
</form>