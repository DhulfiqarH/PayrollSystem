<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System</title>
    <link rel="stylesheet" type="text/css" href="payroll.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
</head>

<body>
  <?php include 'navbar.php'; ?>
    <div class="payroll-container">
        <h2>Payroll</h2>
        <table class="payroll-table">
            <thead>
                <tr>
                    <th>EmployeeID</th>
                    <th>PeriodStartDate</th>
                    <th>PeriodEndDate</th>
                    <th>DateProcessed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>EMP001</td>
                    <td>2023-01-01</td>
                    <td>2023-01-15</td>
                    <td>Approved</td>
                    <td>
                        <button class="view-button">View</button>
                        <button class="edit-button">Edit</button>
                        <button class="remove-button">Remove</button>
                        <button class="add-payroll-button">Add Payroll</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>
