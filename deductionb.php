<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="deductionb.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <!-- PHP data -->
        <!-- <tr>
          <td>EMP001</td>
          <td>Tax</td>
          <td>$120</td>
          <td>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr> -->
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

    <!-- add functionality -->
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
        <!-- PHP data -->

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
</body>
</html>
