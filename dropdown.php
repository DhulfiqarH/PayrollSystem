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
    <span class="cool-button animated-button">Option</span>
    <div class="dropdown-content">
        <a class="cool-button animated-button" onclick="redirectTo('client')">Client Dashboard</a>
        <a class="cool-button animated-button" onclick="redirectTo('admin')">Admin Dashboard</a>
    </div>
</div>
<video id="video-background" autoplay muted loop>
    <source src="images/page.MP4" type="video/mp4">
</video>

<script>
    function redirectTo(role) {
        if (role === 'client') {
            window.location.href = 'clienthome.php';
        } else if (role === 'admin') {
            window.location.href = 'admindash.php';
        }
    }
</script>
<script src="scripts.js"></script>
</body>
</html>
