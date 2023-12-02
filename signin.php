<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="signin.css">
    <link rel="stylesheet" type="text/css" href="dropdown.css">
    <title>Sign In</title>
</head>
<body>
  <?php
  session_start();
  	include("sqlconnection.php");
    $login_success = false;
  $welcome_message = '';
  ?>
  <?php 
  if($_SERVER['REQUEST_METHOD'] == "POST")
  	{
  		//something was posted
  		$UserName = mysqli_real_escape_string($con,$_POST['UserName']);
  		$Password = mysqli_real_escape_string($con,$_POST['Password']);

  		if(!empty($UserName) && !empty($Password) && !is_numeric($UserName))
  		{
  			//read from database
  			$sql = "SELECT UserName FROM UserLogin WHERE UserName = '$UserName' AND Password = '$Password'";
  			$result = mysqli_query($con, $sql);

  			if($result && mysqli_num_rows($result) > 0)
  			{
                // Get User Name
                $getName = "SELECT FirstName, Role FROM Employees JOIN UserLogin ON Employees.EmployeeID = UserLogin.EmployeeID WHERE UserLogin.UserName = '$UserName' AND UserLogin.Password = '$Password'";

                $get_name_result = mysqli_query($con, $getName);

                while ($row = mysqli_fetch_assoc($get_name_result)) {
                    $title = "";
                    if ($row["Role"] == 0) {
                        $title = "Admin";
                    } else {
                        $title = "Client";
                    }
                        $welcome_message = "<div class='center'><h2>Welcome " . $title . ", " . $row["FirstName"] ."</h2></div>";
                        $login_success = true;

                }

  			} else {
                echo "<div class='center'><h2>Invalid Username or Password, try again</h2></div>";

            }

  		}else
  		{
            echo "<div class='center'><h2>Please enter all data</h2></div>";
  			
  		}
  	}
  ?>
  <?php 
  if ($login_success) {
    echo $welcome_message;
    echo "<script>
      setTimeout(function() {
        window.location.href = 'employee.php';
      }, 2000); 
    </script>";
  }
  ?>
  <div class="dropdown">
      <span class="cool-button animated-button">Option</span>
      <div class="dropdown-content">
        <a href="signup.php" class="cool-button animated-button">Signup</a>
        <a href="signin.php" class="cool-button animated-button">Signin</a>
      </div>
  </div>
  <video id="video-background" autoplay muted loop>
      <source src="images/page.mp4" type="video/mp4">
  </video>
    <div class="signin-container">
        <h2>Sign In</h2>
        <form action="signin.php" method="post">
            <label for="UserName">Username:</label>
            <input type="text" name="UserName" required>

            <label for="Password">Password:</label>
            <input type="password" name="Password" required>

            <button type="submit" class="cool-button animated-button" name="signin">Login In</button>
        </form>
        <p>If you don't have account, you can register here <a href="signup.php"> Sign Up </a></p>
    </div>
</body>
</html>
