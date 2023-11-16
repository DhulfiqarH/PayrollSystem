<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="attentancee.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <title>Employee Records</title>
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container">
    <h2>Employee Records</h2>

    <!-- add functionality -->
    <input type="text" class="form-control mb-3" placeholder="Search by employee number or name">

    <!-- count using PHP -->
    <p><strong>Showing 0 entries</strong></p>

    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Employee Number</th>
          <th>Name</th>
          <th>Time Records</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP data -->
        <tr>
          <td>2023-10-01</td>
          <td>EMP001</td>
          <td>John Doe</td>
          <td>Clock In: 09:00 AM<br>Clock Out: 05:00 PM</td>
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
