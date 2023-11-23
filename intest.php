<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>LOGIN information</title>
  <link rel="stylesheet" type="text/css" href="login.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="middle">
    <h1>Login</h1>
    <form method="POST" action="login.php">
      <div class="loginfo">
        <span></span>
        <input type="text" name="username" placeholder="username" required>
      </div>
      <div class="loginfo">
        <span></span>
        <input type="password" name="password" placeholder="password" required>
      </div>
      <input type="submit" id="submit_button" value="Submit">
      <div class="signup"><a href="signup.php">Signup</a></div>
    </form>
  </div>
  <?php
  $username= $_POST['username'];
  $password= $_POST['password'];

  $db = mysqli_connect("studentdb-maria.gl.umbc.edu","dhussei1","dhussei1","dhussei1");

#when users signs into existing user it'll say welcome (the name of the user they entered)
  if(isset($_POST['username'])){
    $constructed_query = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db, $constructed_query);
    if(mysqli_num_rows($result) > 0){
      ?>
      <div class= "center">
        <h2 class="logeduser">Welcome <?php echo $_POST['username'];?></h2>
        <a href="home.php"><h2>home</h2></a>
      </div>
      <?php
    }
    else{
      ?>
      <div class= "center">
        <h2>Login not Successful. Please enter vaild username and password!</h2>
        <a href="login.php"><h2>login</h2></a>
      </div>
      <?php
    }
  }
  ?>
</body>
</html>
