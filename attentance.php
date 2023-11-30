<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="attentancee.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Timesheet</title>
</head>
<body>
  <?php include 'navbar.php';
  include("sqlconnection.php");

      $sql = "SELECT * FROM Timesheet";


    $result = mysqli_query($con, $sql);?>
  <div class="container">
    <h2>TimeSheet</h2>

    <!-- add functionality -->
    <input type="text" class="textbox" placeholder="Search by employee number or name">

    <!-- count using PHP -->
    <p><strong>Showing 0 entries</strong></p>

    <table>
      <thead>
        <tr>
          <th>Timesheet ID</th>
          <th>Employee ID</th>
          <th>StartTime</th>
          <th>EndTime</th>
          <th>Total Hours Worked</th>
          <th>OverTime</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP data -->
        <!-- <tr>
          <td>EMP001</td>
          <td>9:00</td>
          <td>10:10</td>
          <td>1.1 hours</td>
          <td>0</td>
          <td>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr> -->
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["TimesheetID"]. "</td><td>" . $row["EmployeeID"]. "</td><td>". $row["StartTime"]. " </td><td>" . $row["EndTime"]. "</td><td>" . $row["TotalHoursWorked"]. " </td><td>".
        $row["OvertimeHours"]. " </td><td>" .
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
