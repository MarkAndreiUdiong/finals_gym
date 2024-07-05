<?php
session_start();

    $server = "localhost";
    $user = "root";
    $password = "";
    $databaseName = "gym";

    $conn = mysqli_connect($server, $user, $password, $databaseName);

    if (!$conn) {
        die ("<script>alert('Connection Failed!')</script>". mysqli_connect_error());
    } else {
        header("<script>alert('Database Connected Successfully!')</script>");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PABUHAT FITNESS GYM </title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <aside>
        <div class="logo">
            <img src="img/logo1.png" alt="Pabuhat Fitness Gym">
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Home </a></li>
                <li><a href="aboutus.php"><i class="fas fa-dumbbell"></i> About Us </a></li>
                <li><a href="schedule.php"><i class="fas fa-calendar-alt"></i> Book a Schedule </a></li>
            </ul>
        </nav>

        <div class="logout">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <div class="logout-dropdown" id="logoutDropdown">
                <!-- Add any other logout options or actions here -->
            </div>
        </div>
    </aside>

    <main>
        <div class="welcome-message">
            <img class="welcome-image" src="img/crop.png" alt="Welcome Image">
            <div class="welcome-overlay">
                <h1> Welcome to Pabuhat Fitness Gym! </h1>
                <p>Your gateway to a healthier lifestyle.</p>
            </div>
        </div>

        <h1><center> BENEFITS OF JOINING PABUHAT FITNESS </center></h1>

        <section class="articles-container">
            <div class="articles">
                <div class="article">
                    <img src="img/support.jpg" alt="SUPPORT">
                    <div class="article-overlay">
                        <h3> SUPPORT </h3>
                        <p> Every member gets a free, personalized plan when they join. Our friendly and professional Coaches are trained to help you along your fitness journey, no matter where that takes you. </p>
                    </div>
                </div>
                <div class="article">
                    <img src="img/gymrat.jpg" alt="Training & Tools">
                    <div class="article-overlay">
                        <h3> Training & Tools </h3>
                        <p>Together, we can make healthy happen. That’s why we offer personalized support inside the gym, and the right tools to keep you on track when you’re on the go.</p>
                    </div>
                </div>
                <div class="article">
                    <img src="img/gym2.jpg" alt="Community">
                    <div class="article-overlay">
                        <h3> Community </h3>
                        <p>You’re not just joining a fitness center— you’re joining a supportive community of like-minded people who want to see you succeed.</p>
                    </div>
                </div>
                <!-- Add more articles as needed -->
            </div>
        </section>

        <div class="chart-container">
            <canvas id="gymChart"></canvas>
        </div>

        <?php
        // Example PHP logic to fetch data (replace with actual data retrieval)
        $entered = 75;  // Example: Number of people entered the gym
        $exited = 60;   // Example: Number of people exited the gym
        ?>

        <script>
            // PHP variables to JavaScript
            var entered = <?php echo $entered; ?>;
            var exited = <?php echo $exited; ?>;
        </script>

        <br>

        <section id="about" class="text-center">
            <hr style="width:60%; text-align:center; border:1px solid #000000;">
            <br>
            <h1><center>"Tough times don't last, tough people do."</center></h1>
            <br>
            <hr style="width:60%; text-align:center; border:1px solid #000000;">
        </section>
        <br>

        <table class="dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Booking Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
        $sql = "SELECT * FROM `schedule`";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($results)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["fullname"] ?></td>
            <td><?php echo $row["age"] ?></td>
            <td><?php echo $row["bookingDate"] ?></td>
            <td><?php echo $row["timein"] ?></td>
            <td><?php echo $row["timeout"] ?></td>
            <td>
            
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
            </tbody>
        </table>

    </main>
    <footer>
        <p> Copyright © PABUHAT FITNESS GYM 2024 </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>
</html>
