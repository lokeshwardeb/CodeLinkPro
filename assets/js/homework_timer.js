    // Function to format time
    function formatTime(seconds) {
        const days = Math.floor(seconds / 86400);
        seconds %= 86400;
        const hours = Math.floor(seconds / 3600);
        seconds %= 3600;
        const minutes = Math.floor(seconds / 60);
        seconds = seconds % 60;
        return `${String(days).padStart(2, '0')} day : ${String(hours).padStart(2, '0')} hour : ${String(minutes).padStart(2, '0')} min : ${String(seconds).padStart(2, '0')} sec`;
    }

    // Function to start the countdown timer
    function startCountdown(initialTime) {
        let timeLeft = initialTime;
        const timerElement = document.getElementById('timer');

        const countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerElement.innerHTML = 'Time\'s up!';
                window.location.reload();
            } else {
                timerElement.innerHTML = formatTime(timeLeft);
                timeLeft--;
            }
        }, 1000);
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        startCountdown(countdownTime);
    });