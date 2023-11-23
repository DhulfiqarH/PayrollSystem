<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Records</title>
  <link rel="stylesheet" type="text/css" href="employeee.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container">
    <h2>Employees</h2>

    <!-- Search bar (JAVASCRIPT)-->
    <input type="text" class="form-control mb-3" placeholder="Search by employee number or name">

    <!-- Entry count (PHP) -->
    <p><strong>Showing 0 entries</strong></p>

    <!-- Table -->
    <table>
      <thead>
        <tr>
          <th>EmployeeID</th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>PositionID</th>
          <th>DepartmentID</th>
          <th>HireDate</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP data -->
        <tr>
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
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
