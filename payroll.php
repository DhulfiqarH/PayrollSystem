<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Payroll System</title>
    <link rel="stylesheet" type="text/css" href="employee_form.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <link rel="stylesheet" type="text/css" href="payroll.css">
</head>

<body>
    <?php
    include 'navbar.php';
    include("sqlconnection.php");

    $sql = "SELECT * FROM Payroll";
    $result = mysqli_query($con, $sql);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $EmployeeID = intval($_POST["EmployeeID"]);
        $PayrollStartDate = mysqli_real_escape_string($con, $_POST["PayrollStartDate"]);
        $PayrollEndDate = mysqli_real_escape_string($con, $_POST["PayrollEndDate"]);

        $insert_query_ded = "INSERT INTO Payroll (EmployeeID, PeriodStartDate, PeriodEndDate, GrossIncome, NetIncome, DateProcessed) VALUES ($EmployeeID, '$PayrollStartDate', '$PayrollEndDate', NULL, NULL, NOW())";

        $insert_result_ded = mysqli_query($con, $insert_query_ded);

        if ($insert_result_ded) {
            echo "<div class='center'><h2>Payroll successfully Added</h2></div>";
        } else {
            echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
        }
    }
    ?>

    <div class="container">
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
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row["PayrollID"] . "</td>
                                <td>" . $row["EmployeeID"] . "</td>
                                <td>" . $row["PeriodStartDate"] . "</td>
                                <td>" . $row["PeriodEndDate"] . "</td>
                                <td>" . $row["GrossIncome"] . "</td>
                                <td>" . $row["NetIncome"] . "</td>
                                <td>" . $row["DateProcessed"] . "</td>
                                <td>
                                    <button class='btn btn-primary'>Edit</button>
                                    <button class='btn btn-danger'>Delete</button>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="employeeForm" class="signin-container">
        <h2>Add New Payroll</h2>
        <form action="payroll.php" method="POST">
            <label for="EmployeeID">Employee ID:</label>
            <input type="number" name="EmployeeID" required>

            <label for="PayrollStartDate">Period Start Date:</label>
            <input type="date" name="PayrollStartDate" required>

            <label for="PayrollEndDate">Period End Date:</label>
            <input type="date" name="PayrollEndDate" required>

            <button class="btn-sign btn btn-primary" type="submit" name="payrollSubmit">Add</button>
            <button class="btn-sign btn btn-danger" type="reset" name="payrollCancel">Cancel</button>
        </form>
    </div>
</body>

</html>
