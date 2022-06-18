<?php
session_start();
require('nav.php');
if (!isset($_SESSION['username'])) {
    header('LOCATION:login.php');
    die;
}
if (isset($_SESSION['crud'])) {

    if ($_SESSION['crud'] == 'delete') {
        echo "<script>
        alert('succesfully record deleted');
        </script>";
        $_SESSION['crud'] = '';
    }
    elseif ($_SESSION['crud'] == 'update') {
        echo "<script>
            alert('RECORD SUCCESFULLY UPDATED');
        </script>";
        $_SESSION['crud'] = '';
    }
}
$empId = "";
$empSalary = "";
$empDesignation = "";
$empAge = "";
$empName = "";
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];
    if ($emp_id == '') {
        echo '<script> alert("Employee Id field is empty, please enter ID to view details");</script>';
    }
    else {
        require_once('Connection.php');
        $result = search($emp_id);
        if (mysqli_num_rows($result) != 1) {
            echo '<script> alert("No valid Record found, Please Enter a valid Emp Id");</script>';
        }
        else {
            $details = mysqli_fetch_array($result);
            $empId = $details[0];
            $empName = $details[1];
            $empAge = $details[2];
            $empDesignation = $details[3];
            $empSalary = $details[4];
        }
    }
}
?>
<br />
<form method="POST" action="#" class="container">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" id="emp_id" placeholder="ENTER ID..." name="emp_id">
        </div>
        <select class="custom-select col">
            <option selected>Choose</option>
            <option value="*">All</option>
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
<br />
<hr />
<br />
<hr />
<?php if(isset($details)): ?>
<div class="col">
    <form action="update.php" method="POST">
        <div class="row">
            <div class="col">
                <output type="text" class="form-control " id="emp_id" placeholder="ENTER NAME..." name="emp_id"
                    value="<?php echo $empId; ?>">
                    <?php echo $empId; ?>
                </output>
                <input type="hidden" class="form-control " id="emp_id" placeholder="ENTER NAME..." name="emp_id"
                    value="<?php echo $empId; ?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" id="emp_name" placeholder="ENTER NAME..." name="emp_name"
                    value="<?php echo $empName; ?>">
            </div>
            <div class="col">
                <input type="number" class="form-control" id="emp_age" placeholder="ENTER AGE" name="emp_age"
                    value="<?php echo $empAge; ?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" id="emp_salary" placeholder="ENTER SALARY" name="emp_salary"
                    value="<?php echo $empSalary; ?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" id="emp_dsg" placeholder="ENTER DESIGNATION" name="emp_dsg"
                    value="<?php echo $empDesignation; ?>">
            </div>
            <button type="submit" class="btn btn-warning">UPDATE</button>
        </div>
    </form>
    </div>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Employee ID</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Age</th>
            <th scope="col">Designation</th>
            <th scope="col">Salary</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td>
                <?php echo $details[0]; ?>
            </td>
            <td>
                <?php echo $details[1]; ?>
            </td>
            <td>
                <?php echo $details[2]; ?>
            </td>
            <td>
                <?php echo $details[3]; ?>
            </td>
            <td>
                <?php echo $details[4]; ?>
            </td>
            <td>
                <button type="click" class="btn btn-danger"
                    onclick="event.preventDefault();del(<?php echo $details[0]; ?>)">DELETE</button>
            </td>

        </tr>
    </tbody>
</table>
<script>
    function del(id) {
        if (confirm("Do you really want to delete the record?")) {
            window.location = "Connection.php?delete=" + id;
        }
    }
    function edit(id) {
        window.location = "?edit=" + id;
    }
</script>

<?php endif ?>