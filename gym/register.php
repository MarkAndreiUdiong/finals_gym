<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$databaseName = "gym";

$conn = mysqli_connect($server, $user, $password, $databaseName);


if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($duplicate) > 1) {
        echo
        "<script>alert('Email is already taken')</script>";
    }
    else{
        if($password == $cpassword) {
            $query = "INSERT INTO user VALUES('', '$fname', '$email', '$password', '$cpassword')";
            mysqli_query($conn,$query);
            echo
            "<script>alert('Registration Successfully!');
             window.location.href='login.php';</script>";
        }
        else{
            echo
            "<script>alert('Password does not match!')</script>";
        }
    }
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PABUHAT FITNESS GYM | REGISTRATION </title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <main>
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form action="" method="post">
                    <h1> REGISTRATION </h1>
                    <span>or use your account</span>
                    <input type="text" name="fname" id="fname" placeholder="Full Name"/>
                    <input type="email" name="email" id="email" placeholder="Email"/>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"/>
                    <p id="show-btn">Show your password</p>
                    <button type="submit" name="submit"> Sign Up </button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                    <img src="img/logo1.png" alt="Pabuhat Fitness Gym" width="125">
                    <p> Already have an account? <a href="login.php"> Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <p> Copyright © PABUHAT FITNESS GYM 2024 </p>
        </footer>
    </main>


    <script src="script.js"></script>
    <script>
        const show = document.querySelector("#show-btn");
        const password = document.querySelector("#password");
        const cpassword = document.querySelector("#cpassword");

        show.addEventListener("click", () => {
            if (password.type === "password") {
                password.type = "text";
                cpassword.type = "text";
                show.innerText = "Hide your password";
            } else {
                password.type = "password";
                cpassword.type = "password";
                show.innerText = "Show your password";
            }
        })
    </script>
</body>
</html>