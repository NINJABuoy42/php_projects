<?php
session_start();
require('nav.php');
if(!isset($_SESSION['username'])) {
    header('LOCATION:login.php');
    die;
}
$status = $_SESSION['status'];
require_once('Connection.php');
$getDetails = employee($status);
?>
<br/>
<form method="GET" action="" class="container">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" id="emp_id" placeholder="ENTER ID..." name="emp_id">
        </div>
        <select class="custom-select col" name="desg">
            <option selected>Choose</option>
            <option value="*">ALL</option>
           
            <option value="Salary">Salary</option>
            <option value="Designation">Designation</option>
        </select>
        <div class="col">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="add.php" class="btn btn-success">ADD</a>
            <a href="welcome.php" class="btn btn-info">View All</a>
        </div>
        <div class="col">
        </div>
        <div class='container'>
        </div>
</form>
<br/>
<?php 


echo "<div class='container'>";
if($status == 'admin') {
    echo '<table class="table">
    <thead>
    <tr>
    <th scope="col">Employee ID</th>
    <th scope="col">Employee Name</th>
    <th scope="col">Age</th>
    <th scope="col">Designation</th>
    <th scope="col">Salary</th>
      </tr>
      </thead>
      <tbody>';
    while($rows = mysqli_fetch_array($getDetails)) {
    echo '<tr>
      
      <td>'. $rows[0] . '</td>
      <td>' . $rows[1] . '</td>
      <td>' . $rows[2] . '</td>
      <td>' . $rows[3] . '</td>
      <td>' . $rows[4] . '</td>
      </tr>';
    }
    echo ' </tbody>
    </table>';
}
elseif($status == 'tech') {
    echo '<table class="table">
    <thead>
    <tr>
    <th scope="col">Employee ID</th>
    <th scope="col">Employee Name</th>
      <th scope="col">Designation</th>
      </tr>
      </thead>
      <tbody>';
    while ($rows = mysqli_fetch_array($getDetails)) {
        echo '<tr>
      
      <td>' . $rows['Employee_Id'] . '</td>
      <td>' . $rows['Employee_Name'] . '</td>
      <td>' . $rows['Designation'] . '</td>
      </tr>';
    }
    echo ' </tbody>
    </table>';
}
else {
    echo 'your are not authorised to view details';
}

echo "</div>";
?>