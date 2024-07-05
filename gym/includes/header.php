<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pabuhat Fitness Gym Dashboard</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <aside>
        <div class="logo">
            <img src="images/logo.png" alt="Pabuhat Fitness Gym">
        </div>
        <nav>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-dumbbell"></i> Classes</a></li>
                <li><a href="#"><i class="fas fa-user"></i> Trainers</a></li>
                <li><a href="#"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="#" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <div class="logout-dropdown" id="logoutDropdown">
                <a href="#">Logout</a>
                <!-- Add any other logout options or actions here -->
            </div>
        </div>
    </aside>
    <main>
