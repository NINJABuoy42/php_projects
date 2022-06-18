<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empId =  $_POST["emp_id"];
    echo $empId;
    require('Connection.php');
    $result = "DELETE FROM employee WHERE Employee_id = $empId;";
    mysqli_query($conn, $result);
    if(!$result){
        echo mysqli_error($conn);
    }
    echo 'succes';
    mysqli_close($conn);
    $_SESSION['crud'] = 'delete';
    echo "<script>
    alert('succesfully record deleted');
    </script>";
    header('LOCATION:index.php');
    echo "<script>
    alert('succesfully record deleted');
    </script>";
}
?>