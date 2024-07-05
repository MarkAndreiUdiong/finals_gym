<?php
    session_start();

    $server = "localhost";
    $user = "root";
    $password = "";
    $databaseName = "gym";

    $conn = mysqli_connect($server, $user, $password, $databaseName);


    if (isset($_POST["submit"])) {
        $fullname = $_POST['fullname'];
        $bookingDate = $_POST['bookingDate'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $timein = $_POST['timein'];
        $timeout = $_POST['timeout'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $bmi = $_POST['bmi'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        
     
        $sql = "INSERT INTO `schedule`(`fullname`, `bookingDate`, `birthday`, `gender`, `age`, `timein`, `timeout`, `weight`, `height`, `bmi`, `email`, `phoneNumber`)
         VALUES ('$fullname','$bookingDate','$birthday','$gender', '$age', '$timein', '$timeout', '$weight', '$height', '$bmi', '$email', '$phoneNumber')";
     
        $result = mysqli_query($conn, $sql);
     
        
        if ($result) {
          echo  "<script>alert('Booking Successfully!'); 
                     window.location.href='dashboard.php';</script>";
        } else {
           echo "<script>alert('Failed')</script>;" . mysqli_error($conn);
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
        <a href="logout.php" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <div class="logout-dropdown" id="logoutDropdown">
                <!-- Add any other logout options or actions here -->
            </div>
        </div>
    </aside>
    <main>
        <section class="schedule-form">
            <h2>Schedule Your Session</h2>
            <form id="gymScheduleForm" action="schedule.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullName">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="bookingDate">Booking Date:</label>
                        <input type="date" id="bookingDate" name="bookingDate" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" id="birthday" name="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <?php if (isset($gender) && $gender=="male") echo "checked";?>
                            <option value="male">Male</option>
                            <?php if (isset($gender) && $gender=="female") echo "checked";?>
                            <option value="female">Female</option>
                            <?php if (isset($gender) && $gender=="other") echo "checked";?>
                            <option value="other">Other</option>
                        </select>
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
                <div class="form-row">
                    <div class="form-group">
                        <label for="weight">Weight (kg):</label>
                        <input type="number" id="weight" name="weight" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Height (cm):</label>
                        <input type="number" id="height" name="height" required>
                    </div>
                    <div class="form-group">
                        <label for="bmi">BMI:</label>
                        <input type="text" id="bmi" name="bmi" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" required>
                    </div>
                </div>
                <button type="submit" name="submit" id="submit">Submit</button>
            </form>
        </section>    
    </main>

    <script src="js/schedule.js"></script>
</body>
</html>
