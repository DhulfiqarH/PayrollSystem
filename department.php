<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="department.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <title>Department Page</title>
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container">
    <h2>Department List</h2>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Department Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td class="department-link" onclick="window.location.href='department_employees.php?department=HR'">Human Resources</td>
          <td class="action-column">
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
