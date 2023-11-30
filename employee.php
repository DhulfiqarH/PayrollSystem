<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Employee Records</title>
          <link rel="stylesheet" type="text/css" href="signin.css">

  <link rel="stylesheet" type="text/css" href="employeee.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">

</head>
<body>
  <?php include 'navbar.php';
  include 'sqlconnection.php';
  // Test query
// Test query
// $test_query = "INSERT INTO Employees (FirstName, LastName, PositionID, DepartmentID, HireDate, Role) VALUES ('Test', 'User', 1, 1, CURDATE(), 1)";
// $test_result = mysqli_query($con, $test_query);
// if ($test_result) {
//     echo "<p>Test insert successful.</p>";
// } else {
//     echo "<p>Error in test insert: " . mysqli_error($con) . "</p>";
// }


  // Check for a search query
  $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
  ?>
  <div class="container">
    <h2>Employees</h2>

     <!-- Search Form -->
    <form method="get" action="">
      <input type="text" name="search" class="form-control mb-3" placeholder="Search by employee number or name" value="<?php echo htmlspecialchars($searchQuery); ?>">
      <input type="submit" value="Search" class="btn btn-primary">
    </form>

    <?php
    // Modify SQL query based on search input
    if (!empty($searchQuery)) {
      $sql = "SELECT * FROM Employees WHERE EmployeeID LIKE '%$searchQuery%' OR FirstName LIKE '%$searchQuery%' OR LastName LIKE '%$searchQuery%'";
    } else {
      $sql = "CALL Show_All_Employee_Record()";
    }
    $result = mysqli_query($con, $sql);

    // Entry count
    echo "<p><strong>Showing " . mysqli_num_rows($result) . " entries</strong></p>";
    ?>

<button id="addEmployeeBtn" class='btn btn-primary'>Add Employee</button>
    <div id="employeeForm" class="signin-container" style="display: none;">
        <h2>Add New Employee</h2>
        <form action="employee.php" method="post">
            <label for="FirstName">First Name:</label>
            <input type="text" name="FirstName" required>

            <label for="LastName">Last Name:</label>
            <input type="text" name="LastName" required>

            <label for="PositionID">PositionID:</label>
            <input type="number" name="PositionID" required>

            <label for="DepartmentID">DepartmentID:</label>
            <input type="number" name="DepartmentID" required>

            <!-- <label for="HireDate">Hire Date:</label>
            <input type="text" name="HireDate" required> -->

            <label for="Role">Role:</label>
            <input type="number" name="Role" min="0" max="1" required>


            <button class="btn-sign btn btn-primary" type="submit" name="reg_user">Add</button>
                        <button class="btn-sign btn btn-danger" type="button">Cancel</button>


        </form>
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign POST data to variables
  $FirstName = mysqli_real_escape_string($con, $_POST["FirstName"]);
$LastName = mysqli_real_escape_string($con, $_POST["LastName"]);
$PositionID = intval($_POST["PositionID"]);
$DepartmentID = intval($_POST["DepartmentID"]);
$Role = intval($_POST["Role"]);

    // Construct the SQL query
    // $add_employee_query = "CALL Add_Employee('$FirstName', '$LastName', '$PositionID', '$DepartmentID', CURRENT_DATE(), '$Role')";
//  $add_employee_query = "CALL Add_Employee('Snoop', 'Dod', 1, 1, CURRENT_DATE(), 1)";
// $add_employee_query = "INSERT INTO Employees (FirstName, LastName, PositionID, DepartmentID, HireDate, Role) VALUES ('Snoop', 'Dod', 1, 1, CURRENT_DATE(), 1)";
$add_employee_query = "INSERT INTO Employees (FirstName, LastName, PositionID, DepartmentID, HireDate, Role) VALUES ('$FirstName', '$LastName', $PositionID, $DepartmentID, CURDATE(), $Role)";


    // Execute the query

    // Check for success or failure
    $result_add = mysqli_query($con, $add_employee_query);
if ($result_add) {
    echo "<div class='center'><h2>Employee successfully Added</h2></div>";
} else {
    echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
}

}
?>


    <!-- Table -->
    <table>
      <thead>
        <tr>
          <th>Employee ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Position</th>
          <th>Department</th>
          <!-- <th>Hourly Rate</th> -->
          <th>Hire Date</th>
          <!-- <th>Street Address</th>
          <th>City</th>
          <th>State</th>
          <th>ZipCode</th>
          <th>Email</th>
          <th>Phone Number</th> -->
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP data -->
        <!-- <tr>
          <td>GZ1293</td>
          <td>John</td>
          <td>dough</td>
          <td>HR</td>
          <td>Consultant</td>
          <td>January 1st. 2023</td>
          <td>0</td>
          <td>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr> -->
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["EmployeeID"]. "</td><td>" . $row["FirstName"]. " </td><td>" . $row["LastName"]. "</td><td>" . $row["PositionTitle"]. " </td><td>".
        $row["DepartmentName"]. " </td><td>" .
        $row["HireDate"]. " </td><td>" .$row["Role"]. " </td><td>".
        "<button class='btn btn-primary'>Edit</button> " .
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
  <script>
  document.getElementById('addEmployeeBtn').addEventListener('click', function() {
    document.getElementById('employeeForm').style.display = 'block';
  });

  // if cancel, hide the form
  document.querySelector('.btn-danger').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission
        document.getElementById('employeeForm').style.display = 'none';

  });

  // once added, hide the button
  // document.querySelector('.btn-primary[type="submit"]').addEventListener('click', function(event) {
  //   // If you need to actually submit the form, remove the next line
  //   event.preventDefault(); // Prevent form submission for demonstration
  //   document.getElementById('employeeForm').style.display = 'none';
  // });
</script>
</body>
</html>
