<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="employee_form.css">
  <link rel="stylesheet" type="text/css" href="department.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
        $DepartmentName = mysqli_real_escape_string($con, $_POST["DepartmentName"]);
        

        $insert_query = "INSERT INTO Departments (DepartmentName) 
        VALUES ('$DepartmentName')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo "<div class='center'><h2>Department successfully Added</h2></div>";
        } else {
            echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
        }
    }
    ?>
  <div class="container">
    <h2>Departments</h2>

    <table>
      <thead>
        <tr>
          <th>#</th>
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
        "<button class='btn btn-danger'>Delete</button>"  .
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
        <h2>Edit New Department</h2>
        <form action="department.php" method="POST">
          <label for="DepartmentID">Department ID to Edit:</label>
            <input type="number" name="DepartmentID" required>

            <label for="DepartmentName">New Department Name:</label>
            <input type="text" name="DepartmentName" required>

            <button class="btn-sign btn btn-primary" type="submit" name="deptEdit">Update</button>
            <button class="btn-sign btn btn-danger" type="reset" id="removeDeptForm" onclick="removeEditFor()">Cancel</button>
        </form>
    </div>

  <div class="signin-container" id="employeeForm" >
        <h2>Add New Department</h2>
        <form action="department.php" method="POST">
            <label for="DepartmentName">Department Name:</label>
            <input type="text" name="DepartmentName" required>

            <button class="btn-sign btn btn-primary" type="submit" name="reg_user">Add</button>
            <button class="btn-sign btn btn-danger" type="reset">Cancel</button>
        </form>
    </div>
<script>
    function editDepartment(departmentID) {
        var editForm = document.getElementById("editForm");
        editForm.style.display = "block"; // Show the form


        var departmentIDField = document.querySelector("input[name='DepartmentID']");
        var departmentNameField = document.querySelector("input[name='DepartmentName']");
        
        departmentIDField.value = departmentID;
        departmentNameField.value = departmentName;
    }
    function removeEditFor() {
      var removeForm =document.getElementById("editForm");
      removeForm.style.display = "none";
    }
    
</script>
</body>
</html>
