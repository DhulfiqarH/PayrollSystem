<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="signin.css">
    <title>Sign In</title>
</head>
<body>
  <?php
  session_start();
    include("navbar.php");
  	include("sqlconnection.php");


  	if($_SERVER['REQUEST_METHOD'] == "POST")
  	{
  		//something was posted
  		$UserName = $_POST['UserName'];
  		$Password = $_POST['Password'];

  		if(!empty($UserName) && !empty($Password) && !empty($Email) && !empty($Phone) && !is_numeric($UserName))
  		{
  			//read from database
  			$sql = "select * from UserLogin where UserName = '$UserName' limit 1";
  			$result = mysqli_query($con, $sql);

  			if($result)
  			{
  				if($result && mysqli_num_rows($result) > 0)
  				{
  					$user_data = mysqli_fetch_assoc($result);
  				}
  			}

  			echo "wrong username or password!";
  		}else
  		{
  			echo "wrong username or password!";
  		}
  	}

  ?>
    <div class="signin-container">
        <h2>Sign In</h2>
        <form action="signin.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="UserName" required>

            <label for="password">Password:</label>
            <input type="password" name="Password" required>

            <button type="submit" name="signin">Sign In</button>
        </form>
    </div>
</body>
</html>
