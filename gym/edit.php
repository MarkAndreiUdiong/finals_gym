<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$databaseName = "gym";

$conn = mysqli_connect($server, $user, $password, $databaseName);

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $fullname = $_POST['fullname'];
    $bookingDate = $_POST['bookingDate'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    
 
    $sql = "UPDATE `schedule` SET `fullname`='$fullname',`bookingDate`='$bookingDate',`timein`='$timein',`timeout`='$timeout' WHERE id = $id";
  
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert('Updated Successfully'); 
    window.location.href='dashboard.php';</script>";
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pabuhat Fitness Gym Schedule</title>
    <link rel="stylesheet" href="css/schedule.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout </a>
            <div class="logout-dropdown" id="logoutDropdown">
            </div>
        </div>
    </aside>
    <main>
    
    <?php
    $sql = "SELECT * FROM `schedule` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
        <section class="schedule-form">
            <h2>Schedule Your Session</h2>
            <form id="gymScheduleForm" action="" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullName">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="bookingDate">Booking Date:</label>
                        <input type="date" id="bookingDate" name="bookingDate" required>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" id="age" name="age" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="time-in">Time In</label>
                        <input type="text" name="timein" id="timein" required>
                    </div>
                    <div class="form-group">
                        <label for="time-out">Time Out</label>
                        <input type="text" name="timeout" id="timeout" required>
                    </div>
                </div>
                </div>
                <button type="submit" name="submit" id="submit">Submit</button>
            </form>
        </section>
        
    </main>
    <script src="js/schedule.js"></script>
</body>
</html>

