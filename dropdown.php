<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dropdown.css">
    <title>Company Dashboard</title>
</head>
<body>
<div class="dropdown">
    <span class="cool-button animated-button">Sign In</span>
    <div class="dropdown-content">
        <a class="cool-button animated-button" onclick="redirectTo('client')">Client Dashboard</a>
        <a class="cool-button animated-button" onclick="redirectTo('admin')">Admin Dashboard</a>
    </div>
</div>
<div>
    <img id="logo" src="images/black_logo.png" alt="Your Logo">
</div>
<video id="video-background" autoplay muted loop>
    <source src="images/page.MP4" type="video/mp4">
</video>
<div class="company-info">
    <h1>Company Name</h1>
    <p>Some information about your company goes here.</p>
</div>

<div class="additional-content">
    <h2>Additional Content</h2>
    <p>This is additional content below the video. Add more details here.</p>
</div>


<script>
    function redirectTo(role) {
        window.location.href = 'signin.php';

    }
</script>
<script src="scripts.js"></script>
</body>
</html>
