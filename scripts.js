window.addEventListener('scroll', function () {
    var video = document.getElementById('video-background');
    var scrollPosition = window.scrollY;

    // Adjust the opacity based on the scroll position
    var opacity = 1 - scrollPosition / 850; // You can adjust the division value for a smoother effect

    // Ensure the opacity is within the range [0, 1]
    opacity = Math.max(0, Math.min(1, opacity));

    // Apply the opacity to the video
    video.style.opacity = opacity;
});
