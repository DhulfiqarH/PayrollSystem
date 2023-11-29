<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Records</title>
  <link rel="stylesheet" type="text/css" href="employeee.css">
</head>
<body>
  <?php include 'navbar.php';
  include("sqlconnection.php");

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
</body>
</html>
