<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Payroll System</title>
    <link rel="stylesheet" type="text/css" href="navbar.css">
        <link rel="stylesheet" type="text/css" href="payroll.css">

</head>

<body>
  <?php include 'navbar.php';
  include("sqlconnection.php");

      $sql = "SELECT * FROM Payroll";


    $result = mysqli_query($con, $sql); ?>
    <div class="payroll-container">
        <h2>Payroll</h2>
        <table class="payroll-table">
            <thead>
                <tr>
                    <th>Payroll ID</th>
                    <th>Employee ID</th>
                    <th>Period Start Date</th>
                    <th>Period End Date</th>
                    <th>Gross Income ($)</th>
                    <th>Net Income ($)</th>
                    <th>Date Processed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                 <td>1001</td>

                    <td>EMP001</td>
                    <td>2023-01-01</td>
                    <td>2023-01-15</td>
                    <td>2023-01-15</td>
                    <td>2023-01-15</td>
                    <td>Approved</td>
                    <td>
                        <button class="view-button">View</button>
                        <button class="edit-button">Edit</button>
                        <button class="remove-button">Remove</button>
                        <button class="add-payroll-button">Add Payroll</button>
                    </td>
                </tr> -->
                <!-- Add more rows as needed -->
                <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["PayrollID"]. "</td><td>" . $row["EmployeeID"]. " </td><td>" . $row["PeriodStartDate"]. "</td><td>" . $row["PeriodEndDate"]. " </td><td>".
        $row["GrossIncome"]. " </td><td>" .
        $row["NetIncome"]. " </td><td>" .$row["DateProcessed"]. " </td><td>".
        "<button class='btn btn-primary'>Edit</button> " .
        "<button class='btn btn-danger'>Delete</button>"  .
        "<button class='btn btn-danger'>Remove</button> " .
        "<button class='btn btn-primary'>Add Payroll</button>"  .
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
