<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="employee_form.css">
    <link rel="stylesheet" type="text/css" href="department.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">


    <title>Department Page</title>
</head>

<body>
    <?php include 'navbar.php';
  include("sqlconnection.php");

      $sql = "SELECT * FROM Departments";


    $result = mysqli_query($con, $sql);
  ?>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["newDeptAdd"])) {
 $DepartmentName = mysqli_real_escape_string($con, $_POST["DepartmentName"]);
        

        $insert_query = "INSERT INTO Departments (DepartmentName) 
        VALUES ('$DepartmentName')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo "<div class='center'><h2>Department successfully Added</h2></div>";

        } else {
            echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
        }

      } elseif (isset($_POST["deptEdit"])) {
        $NewDepartmentName = mysqli_real_escape_string($con, $_POST["NewDepartmentName"]);
$NewDepartmentID = intval($_POST["NewDepartmentID"]);

$checkDeptExistence = "SELECT DepartmentID FROM Departments WHERE DepartmentID = $NewDepartmentID";
$deptExistCheck = mysqli_query($con, $checkDeptExistence);

if ($deptExistCheck && mysqli_num_rows($deptExistCheck) > 0) {
    $update_query = "UPDATE Departments SET DepartmentName = '$NewDepartmentName' WHERE DepartmentID = $NewDepartmentID";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        echo "<div class='center'><h2>Department Updated successfully</h2></div>";
        
    } else {
        echo "<div class='center'><h2>Failed to update department, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
    }
} else {
    echo "<div class='center'><h2>No Department with that ID, Try Again</h2></div>";
}

    } elseif (isset($_POST["deptDelete"])) {

$DeleteDeptID = intval($_POST["DeleteDeptID"]);

$checkDeptExistence_1 = "SELECT DepartmentID FROM Departments WHERE DepartmentID = $DeleteDeptID";
$deptExistCheck = mysqli_query($con, $checkDeptExistence_1);

if ($deptExistCheck && mysqli_num_rows($deptExistCheck) > 0) {
    $delete_query = "DELETE FROM Departments WHERE DepartmentID = $DeleteDeptID";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "<div class='center'><h2>Department Deleted successfully</h2></div>";
    } else {
        echo "<div class='center'><h2>Failed to delete department, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
    }
} else {
    echo "<div class='center'><h2>No Department with that ID, Try Again</h2></div>";
}

    }
      
    }
 
    ?>
    <div class="container">
        <h2>Departments</h2>

        <table>
            <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["DepartmentID"]. "</td><td>" . $row["DepartmentName"]. " </td><td>" .
        "<button class='btn btn-primary' onclick='editDepartment(" . $row["DepartmentID"] . ")'>Edit</button> " . 
        "<button class='btn btn-danger' onclick='DeleteDeptID(" . $row["DepartmentID"] . ")'>Delete</button>"  .
        "</td></tr>";
    }
} else {
    echo "0 results";
}
        ?>
            </tbody>
        </table>
    </div>

    <!-- edit form-->
    <div class="signin-container" id="editForm" style="display: none;">
        <h2>Edit Department</h2>
        <form action="department.php" method="POST">
            <label for="NewDepartmentID">Department ID to Edit:</label>
            <input type="number" name="NewDepartmentID" required>

            <label for="NewDepartmentName">New Department Name:</label>
            <input type="text" name="NewDepartmentName" required>

            <button class="btn-sign btn btn-primary" type="submit" name="deptEdit">Update</button>
            <button class="btn-sign btn btn-danger" type="reset" id="removeDeptForm"
                onclick="removeEditFor()">Cancel</button>
        </form>
    </div>
    <!-- Delete Department -->
    <div class="signin-container" id="deleteDept" style="display: none;">
        <h2>Delete Department</h2>
        <form action="department.php" method="POST">
            <label for="DeleteDeptID">Department ID to Delete:</label>
            <input type="number" name="DeleteDeptID" required>


            <button class="btn-sign btn btn-danger" type="submit" name="deptDelete">Delete</button>
            <button class="btn-sign btn btn-primary" type="reset" id="removeDeptForm"
                onclick="deleteDeptID()">Cancel</button>
        </form>
    </div>

    <div class="signin-container" id="employeeForm">
        <h2>Add New Department</h2>
        <form action="department.php" method="POST">
            <label for="DepartmentName">Department Name:</label>
            <input type="text" name="DepartmentName" required>

            <button class="btn-sign btn btn-primary" type="submit" name="newDeptAdd">Add</button>
            <button class="btn-sign btn btn-danger" type="reset">Cancel</button>
        </form>
    </div>

    <?php 
// include 'footer.php';
?>
    <script>
    function editDepartment(departmentID) {
        var editForm = document.getElementById("editForm");
        editForm.style.display = "block"; // Show the form
    }

    function removeEditFor() {
        var removeForm = document.getElementById("editForm");
        removeForm.style.display = "none";
    }
    // delete 
    function DeleteDeptID(departmentID) {
        var editForm = document.getElementById("deleteDept");
        editForm.style.display = "block"; // Show the form

    }

    function deleteDeptID() {
        var removeForm = document.getElementById("deleteDept");
        removeForm.style.display = "none";
    }
    </script>
</body>

</html>