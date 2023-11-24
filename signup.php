<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <title>Sign Up</title>
</head>
<body>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="signup.css">
      <link rel="stylesheet" type="text/css" href="navbar.css">
      <title>Sign Up</title>
  </head>
  <body>
      <?php include 'navbar.php'; ?>
      <?php
      session_start();
      	include("sqlconnection.php");

      	if($_SERVER['REQUEST_METHOD'] == "POST")
      	{
      		//something was posted
      		$UserName= $_POST['UserName'];
      		$Password = $_POST['Password'];
          $Email= $_POST['Email'];
      		$Phone = $_POST['Password'];

      		if(!empty($UserName) && !empty($Password) && !empty($Email) && !empty($Phone) && !is_numeric($UserName))
      		{
      			//save to database
      			$sql= "insert into UserLogin (UserName, Password, Email, Phone) values ('$UserName','$password', '$Email', '$Phone')";
      			mysqli_query($con, $sql);

      			header("Location: login.php");
      			die;
      		}else
      		{
      			echo "Please enter some valid information!";
      		}
      	}
      ?>
      <div class="signup-container">
          <h2>Sign Up</h2>
          <form action="signup.php" method="post">
              <label for="Email">Email:</label>
              <input type="Email" name="Email" required>

              <label for="Phone">Phone:</label>
              <input type="text" name="Phone" required>

              <label for="UserName">Username:</label>
              <input type="text" name="UserName" required>

              <label for="Password">Password:</label>
              <input type="Password" name="Password" required>

              <button type="submit" name="reg_user">Sign Up</button>
          </form>
      </div>
  </body>
  </html>
