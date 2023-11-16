<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Signup Information</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="middle">
    <h1>Signup</h1>
    <form method="POST" action="signup.php">
      <div class="signup">
        <span></span>
        <input type="text" name="username" placeholder="Username" required>
      </div>
      <div class="signup">
        <span></span>
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="signup">
        <span></span>
        <input type="password" name="repassword" placeholder="Re-enter Password" required>
      </div>
      <input type="submit" id="submit_button" value="Submit">
      <div class="exist"><a href="login.php">Already have an account?</a></div>
    </form>
  </div>
  <?php
    $username= $_POST['username'];
    $password= $_POST['password'];
    $repassword= $_POST['repassword'];


    $db = mysqli_connect("studentdb-maria.gl.umbc.edu","dhussei1","dhussei1","dhussei1");

  #selects username from signup table in sql
    $constructed_query = mysqli_query($db, "SELECT * FROM signup WHERE username='$username'");
  #counts the rows and checks if the username exists
    if(mysqli_num_rows($constructed_query) > 0){
      ?>
      <div class= "center">
      <h2>Username already exist! Please enter a different username.</h2>
      <a href="login.php"><h2>Please login</h2></a>
      </div>
      <?php

    }
  #checks if the password and the confirmation password match, if they do it'll insert it in the signup table in sql
    else{
      if($password === $repassword){
        $constructed_query = "INSERT INTO signup (username, password, repassword)
        values('$username', '$password', '$repassword')";
        ?>
        <div class ="center">
          <h2>Signup Successful!</h2>
          <a href="login.php"><h2>Login</h2></a>
        </div>
        <?php
      }
      else{
        ?>
        <div class ="center">
          <h2>Passwords do not match! Please enter matching password.</h2>
          <a href="signup.php"><h2>Signup</h2></a>
        </div>
        <?php
      }
    }
    $result =mysqli_query($db, $constructed_query);
    ?>
</body>
</html>
