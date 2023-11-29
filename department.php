<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="department.css">
  <title>Department Page</title>
</head>
<body>
  <?php include 'navbar.php';
  include("sqlconnection.php");

      $sql = "SELECT * FROM Departments";


    $result = mysqli_query($con, $sql);
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
        <!-- <tr>
          <td>1</td>
          <td class="department-link" onclick="window.location.href='department_employees.php?department=HR'">Human Resources</td>
          <td class="action-column">
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Delete</button>
          </td>
        </tr> -->
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["DepartmentID"]. "</td><td>" . $row["DepartmentName"]. " </td><td>" .
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
