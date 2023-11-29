<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
  <?php include 'cnavbar.php'?>
  <div class="container">
    <div class="graph-container">
      <h2>Income Overview</h2>
      <div class="graph">
        <canvas id="incomeChart"></canvas>
      </div>
    </div>
    <div class="info-container">
      <div class="info-box announcements">
        <h2>Announcements</h2>
        <ul>
          <li class="animated-box">Announcement 1</li>
          <li class="animated-box">Announcement 2</li>

        </ul>
      </div>
      <div class="info-box upcoming-payday">
        <h2>Upcoming Payday</h2>
        <p class="animated-box">Next payday: 01/15/2023</p>
      </div>
      <div class="info-box payment-account">
        <h2>Payment Account</h2>
        <p class="animated-box">Account balance: $5,000.00</p>
      </div>
    </div>
  </div>

</body>
</html>
