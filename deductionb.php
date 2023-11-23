<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="deductionb.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <title>Deductions & Benefits</title>
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container">
    <h2>Deductions & Benefits</h2>

    <!-- add functionality -->
    <table>
      <thead>
        <tr>
          <th>DeductionID</th>
          <th>DeductionName</th>
          <th>Amount</th>
          <th>BenefitID</th>
          <th>BenefitName</th>
          <th>BenefitDesciption</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP data -->
        <tr>
          <td>EMP001</td>
          <td>Tax</td>
          <td>$120</td>
          <td>EMP001</td>
          <td>Healthcare</td>
          <td>Here is your benfits for your healthcare.</td>
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
