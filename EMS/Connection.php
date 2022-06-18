<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = 'jsd';

// Create connection
$conn = mysqli_connect($serverName, $userName, $password,$dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function login($user , $pass) {
    $conn = $GLOBALS['conn'];
    $query = "SELECT * FROM users WHERE username='$user' && password='$pass';";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1) {
        $rows = mysqli_fetch_array($result);
        return $rows;
    }
   
}

function employee($status) {
    $conn = $GLOBALS['conn'];
    if($status == 'admin') {
        $query = "SELECT * FROM employee;";
        $result = mysqli_query($conn, $query);
        // $rows = mysqli_fetch_assoc($result);
        return $result;
    }
    elseif($status == 'tech') {
        $query = "SELECT Employee_Id,Employee_Name,Designation FROM employee;";
        $result = mysqli_query($conn, $query);
        // $rows = mysqli_fetch_assoc($result);
        return $result;

    }
    // mysqli_close($conn);
}
function search($emp_id) {
    $conn = $GLOBALS['conn'];
    $query = "SELECT * FROM employee WHERE Employee_id=$emp_id;";
    $result = mysqli_query($conn, $query);
    return $result;

}
function addEmployee($empName,$empAge,$empDesignation,$empSalary) {
    $conn = $GLOBALS['conn'];
    $query = "INSERT INTO employee(Employee_Name,Age,Designation,Salary) VALUES('$empName',$empAge,'$empDesignation','$empSalary');";
    $result = mysqli_query($conn, $query);
    if(!$result){
        return mysqli_error($conn);
    }
    return 'sucsecss';
}


if(isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $query = "DELETE FROM employee WHERE Employee_id =$del";
    mysqli_query($conn, $query);
    header("LOCATION:index.php");
}
if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $query = "SELECT * FROM employee where Employee_id =$edit;";
    $result = mysqli_query($conn, $query);
    header("LOCATION:index.php");
}
?>
