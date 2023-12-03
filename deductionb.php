<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="employee_form.css">

    <link rel="stylesheet" type="text/css" href="deductionb.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <title>Deductions & Benefits</title>
</head>

<body>
    <?php include 'navbar.php';
  include("sqlconnection.php");

      $sql = "SELECT * FROM Deductions";


    $result = mysqli_query($con, $sql);

    $sql_benefit = "SELECT * FROM Benefits";
    $result_benefit = mysqli_query($con, $sql_benefit);
    ?>
    <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["deductionSubmit"])) {
      // Deduction form submission
      $DeductionName = mysqli_real_escape_string($con, $_POST["DeductionName"]);
      $DeductionAmount = mysqli_real_escape_string($con, $_POST["DeductionAmount"]);
      $DeductionPer = $DeductionAmount / 100;

      $insert_query_ded = "INSERT INTO Deductions (DeductionName, Amount) 
      VALUES ('$DeductionName', '$DeductionPer')";
      $insert_result_ded = mysqli_query($con, $insert_query_ded);

      if ($insert_result_ded) {
        echo "<div class='center'><h2>Deduction successfully Added</h2></div>";
      } else {
        echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
      }
    } elseif (isset($_POST["benefitSubmit"])) {
      // Benefit form submission
      $BenefitName = mysqli_real_escape_string($con, $_POST["BenefitName"]);
      $BenefitDesciption = mysqli_real_escape_string($con, $_POST["BenefitDescription"]);

      $insert_query = "INSERT INTO Benefits (BenefitName, BenefitDesciption) 
      VALUES ('$BenefitName', '$BenefitDesciption')";
      $insert_result = mysqli_query($con, $insert_query);

      if ($insert_result) {
        echo "<div class='center'><h2>Benefit successfully Added</h2></div>";
      } else {
        echo "<div class='center'><h2>Failed, Try Again</h2><br>Error: " . mysqli_error($con) . "</div>";
      }
    }
  }
  ?>
    <div class="container">
        <h2>Deductions</h2>

        <!-- add functionality -->
        <table>
            <thead>
                <tr>
                    <th>Deduction ID</th>
                    <th>Deduction Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["DeductionID"]. "</td><td>" . $row["DeductionName"]. " </td><td>" . $row["Amount"]. " </td><td>" .
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
        <div id="employeeForm" class="signin-container">
            <h2>Add New Deduction</h2>
            <form action="deductionb.php" method="POST">
                <label for="DeductionName">Deduction Name:</label>
                <input type="text" name="DeductionName" required>

                <label for="DeductionAmount">Deduction Percentage:</label>
                <input type="number" name="DeductionAmount" placeholder="Please enter a number" required>

                <button class="btn-sign btn btn-primary" type="submit" name="deductionSubmit">Add</button>
                <button class="btn-sign btn btn-danger" type="reset" name="deductionCancel">Cancel</button>
            </form>
        </div>

        <h2>Benefits</h2>

        <table>
            <thead>
                <tr>
                    <th>Benefit ID</th>
                    <th>Benefit Name</th>
                    <th>Benefit Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
        if (mysqli_num_rows($result_benefit) > 0) {
          while ($row = mysqli_fetch_assoc($result_benefit)) {
        echo "<tr><td>" . $row["BenefitID"]. "</td><td>" . $row["BenefitName"]. " </td><td>" . $row["BenefitDesciption"]. " </td><td>" .
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
        <h2>Add New Benefit</h2>
        <form action="deductionb.php" method="POST">
            <label for="BenefitName">Benefit Name:</label>
            <input type="text" name="BenefitName" required>

            <label for="BenefitDescription">Benefit Description:</label>
            <input type="text" name="BenefitDescription" required>

            <button class="btn-sign btn btn-primary" type="submit" name="benefitSubmit">Add</button>
            <button class="btn-sign btn btn-danger" type="reset" name="benefitCancel">Cancel</button>
        </form>
    </div>

</body>

</html>