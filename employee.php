<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>

    <title>Employee Records</title>
    <link rel="stylesheet" type="text/css" href="employee_form.css">
    <link rel="stylesheet" type="text/css" href="employeee.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">

</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    include 'sqlconnection.php';

    $sql_former = "SELECT PastEmpID, FirstName, LastName, p.PositionTitle, d.DepartmentName, StartDate, EndDate 
    FROM Emp_Repository er, Positions p, Departments d
    WHERE er.positionid = p.positionid
    AND p.departmentid = d.departmentid
    ORDER BY pastempid ASC";

    $result_former = mysqli_query($con, $sql_former); 
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $FirstName = mysqli_real_escape_string($con, $_POST["FirstName"]);
        $LastName = mysqli_real_escape_string($con, $_POST["LastName"]);
        $PositionID = intval($_POST["PositionID"]);
        $DepartmentID = intval($_POST["DepartmentID"]);
        $Role = intval($_POST["Role"]);

        $insert_query = "INSERT INTO Employees (FirstName, LastName, PositionID, DepartmentID, HireDate, Role) 
        VALUES ('$FirstName', '$LastName', $PositionID, $DepartmentID, CURRENT_DATE(), $Role)";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo "<div class='center'><h2>Employee successfully Added</h2></div>";
        } else {
            echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
        }
    }
    ?>

    <div class="container">
        <h2>Employees</h2>
        <form method="get" action="">
            <?php
            $searchValue = '';
            if (isset($_GET['search'])) {
                $searchValue = htmlspecialchars($_GET['search']);
            }
            ?>
            <input type="text" name="search" class="form-control mb-3" placeholder="Search by employee number or name"
                value="<?php echo $searchValue; ?>">
            <input type="submit" value="Search" class="btn btn-primary">
        </form>

        <?php
        $searchQuery = '';
        if (isset($_GET['search'])) {
            $searchQuery = $_GET['search'];
        }

        if (!empty($searchQuery)) {
            $searchQuery = mysqli_real_escape_string($con, $searchQuery); // Sanitize user input
            $sql = "SELECT * FROM Employees WHERE EmployeeID LIKE '%$searchQuery%' OR FirstName LIKE '%$searchQuery%' OR LastName LIKE '%$searchQuery%'";
        } else {
            $sql = "CALL Show_All_Employee_Record()";
        }

        $result = mysqli_query($con, $sql);

        if (!$result) {
            echo "<p>Error fetching employees: " . mysqli_error($con) . "</p>";
        } else {
            echo "<p><strong>Showing " . mysqli_num_rows($result) . " entries</strong></p>";
            ?>
        <div class="table-responsive">
            <?php
            echo '<table>
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Hire Date</th>
                            <th>Hourly Rate</th>
                            <th>Benefits</th>
                            <th>Deductions</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>StreetAddress</th>
                            <th>City</th>
                            <th>State</th>
                            <th>ZipCode</th>
                            <th>UserName</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                    ?>
        </div>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["EmployeeID"]. "</td>
                        <td>" . $row["FirstName"]. "</td>
                        <td>" . $row["LastName"]. "</td>
                        <td>" . $row["PositionTitle"]. "</td>
                        <td>" . $row["DepartmentName"]. "</td>
                        <td>" . $row["Role"]. "</td>
                        <td>" . $row["HireDate"]. "</td>
                        <td>" . $row["Hourly_Rate"]. "</td>
                        <td>" . $row["Benefits"]. "</td>
                        <td>" . $row["Deductions"]. "</td>
                        <td>" . $row["Email"]. "</td>
                        <td>" . $row["Phone"]. "</td>
                        <td>" . $row["StreetAddress"]. "</td>
                        <td>" . $row["City"]. "</td>
                        <td>" . $row["State"]. "</td>
                        <td>" . $row["ZipCode"]. "</td>
                        <td>" . $row["UserName"]. "</td>
                        <td>
                           <button class='btn btn-primary'>Edit</button>
                            <button class='btn btn-danger'>Delete</button>
                        </td>
                    </tr>";
            }

            echo '</tbody></table>';
        }
        ?>
    </div>

    <div class="container">
        <h2>Former Employees</h2>
        <?php
        echo '<table>
                <thead>
                    <tr>
                        <th>PastEmpID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Hire Date</th>
                        <th>Termination Date</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_assoc($result_former)) {
            echo "<tr>
                    <td>" . $row["PastEmpID"]. "</td>
                    <td>" . $row["FirstName"]. "</td>
                    <td>" . $row["LastName"]. "</td>
                    <td>" . $row["PositionTitle"]. "</td>
                    <td>" . $row["DepartmentName"]. "</td>
                    <td>" . $row["StartDate"]. "</td>
                    <td>" . $row["EndDate"]. "</td>
                </tr>";
        }

        echo '</tbody></table>';
        ?>
    </div>

    <div id="employeeForm" class="signin-container">
        <h2>Add New Employee</h2>
        <form action="employee.php" method="POST">
            <label for="FirstName">First Name:</label>
            <input type="text" name="FirstName" required>

            <label for="LastName">Last Name:</label>
            <input type="text" name="LastName" required>

            <label for="PositionID">PositionID:</label>
            <input type="number" name="PositionID" required>

            <label for="DepartmentID">DepartmentID:</label>
            <input type="number" name="DepartmentID" required>

            <label for="Role">Role:</label>
            <input type="number" name="Role" min="0" max="1" required>

            <button class="btn-sign btn btn-primary" type="submit" name="reg_user">Add</button>
            <button class="btn-sign btn btn-danger" type="reset">Cancel</button>
        </form>
    </div>


</body>

</html>