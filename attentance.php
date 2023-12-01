<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="employee_form.css">

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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Deduction form submission
      $EmployeeID = intval($_POST["EmployeeID"]);
      $StartTime = mysqli_real_escape_string($con, $_POST["StartTime"]);
      $EndTime = mysqli_real_escape_string($con, $_POST["EndTime"]);
      $OvertimeHours = intval($_POST["OvertimeHours"]);
      $TotalHour = intval($_POST["TotalHour"]);

      $sqlStartDatetime = date("Y-m-d H:i:s", strtotime($StartTime));
      $sqlEndDatetime = date("Y-m-d H:i:s", strtotime($EndTime));

    //   echo "$PayrollDateTime";
    //   echo "$PayrollDate";
    //   $DeductionPer = $DeductionAmount / 100;

      $insert_query_ded = "INSERT INTO Timesheet
	(EmployeeID, StartTime, EndTime, TotalHoursWorked, OvertimeHours)
VALUES
	(1, '$sqlStartDatetime', '$sqlEndDatetime', $TotalHour, $OvertimeHours)";

      $insert_result_ded = mysqli_query($con, $insert_query_ded);

      if ($insert_result_ded) {
        echo "<div class='center'><h2>Attendance successfully Added</h2></div>";
      } else {
        echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
      }
}
      ?>
  <div class="container">
    <h2>TimeSheet</h2>

    <!-- add functionality -->
    <!-- <input type="text" class="textbox" placeholder="Search by employee number or name"> -->

    <!-- count using PHP -->
    <!-- <p><strong>Showing 0 entries</strong></p> -->

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
  <div id="employeeForm" class="signin-container">
        <h2>Add New Attendance</h2>
        <form action="attentance.php" method="POST">
          <!-- 
            EmployeeID INT NOT NULL,
	StartTime TIMESTAMP,
	EndTime TIMESTAMP,
	TotalHoursWorked DECIMAL(10, 2),
	OvertimeHours DECIMAL(10, 2),

           -->
            <label for="EmployeeID">Employee ID:</label>
            <input type="number" name="EmployeeID" required>
            
            <label for="StartTime">Clock-In Time:</label>
            <input type="datetime-local" name="StartTime" required>
            
            <label for="EndTime">Clock-Out Time:</label>
            <input type="datetime-local" name="EndTime" required>
            
            <label for="TotalHour">Total Hour:</label>
            <input type="number" name="TotalHour" required>

            <label for="OvertimeHours">Over-time Hours:</label>
            <input type="number" name="OvertimeHours" required>
            
  
            
            <button class="btn-sign btn btn-primary" type="submit" name="timesheetbtn">Add</button>
            <button class="btn-sign btn btn-danger" type="reset">Cancel</button>
        </form>
    </div>
</body>
</html>
