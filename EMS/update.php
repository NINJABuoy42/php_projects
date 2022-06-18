<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empId =  $_POST["emp_id"];
    $empSalary ="$". $_POST["emp_salary"];
    $empDesignation = $_POST["emp_dsg"];
    $empAge =$_POST["emp_age"];
    $empName = $_POST["emp_name"];
    echo $empId;
    require('Connection.php');
    $result = "UPDATE employee SET Employee_Name ='$empName', Age = $empAge, Salary = '$empSalary', Designation ='$empDesignation' WHERE Employee_id = $empId;";
    
    mysqli_query($conn, $result);
    if(!$result){
        echo mysqli_error($conn);
    }
    echo 'succes';
    mysqli_close($conn);
    $_SESSION['crud'] = 'update';
    header('LOCATION:index.php');
}
?>
