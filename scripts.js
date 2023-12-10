window.addEventListener('scroll', function () {
    var video = document.getElementById('video-background');
    var videoHeight = video.offsetHeight;
    var scrollPosition = window.scrollY;

    // Calculate the distance from the top of the page to the bottom of the video
    var videoBottom = video.offsetTop + videoHeight;

    // Calculate the opacity based on the distance from the top of the page to the bottom of the video
    var opacity = 1 - (scrollPosition / videoBottom);

    // Ensure the opacity is within the range [0, 1]
    opacity = Math.max(0, Math.min(1, opacity));

    // Apply the opacity to the video
    video.style.opacity = opacity;
});

<script>
    // Assuming $result contains the query result
    var payrollData = <?php echo json_encode($payrollData); ?>;

    // Extract dates and amounts from the PHP result
    var dates = payrollData.map(item => item.DateProcessed);
    var amounts = payrollData.map(item => item.NetIncome);

    // Convert dates to a more readable format (you might want to customize this)
    var formattedDates = dates.map(date => new Date(date).toLocaleDateString());

    // Get the canvas element
    var ctx = document.getElementById('payrollChart').getContext('2d');

    // Create the chart
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: formattedDates,
            datasets: [{
                label: 'Net Income ($)',
                data: amounts,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    });
</script>
