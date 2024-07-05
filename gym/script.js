document.addEventListener('DOMContentLoaded', function() {
    // Chart.js
    var ctx = document.getElementById('gymChart').getContext('2d');
    var gymChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Entered', 'Exited'],
            datasets: [{
                label: 'People Entered',
                data: [entered, exited],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)', // Entered color
                    'rgba(255, 99, 132, 0.2)', // Exited color
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });

    // JavaScript for logout dropdown
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutDropdown = document.getElementById('logoutDropdown');

    logoutBtn.addEventListener('click', function(event) {
        event.preventDefault();
        logoutDropdown.classList.toggle('show');
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (!event.target.matches('#logoutBtn')) {
            if (logoutDropdown.classList.contains('show')) {
                logoutDropdown.classList.remove('show');
            }
        }
    });
});
