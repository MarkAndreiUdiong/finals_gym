<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$databaseName = "gym";

$conn = mysqli_connect($server, $user, $password, $databaseName);



if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0) {
        if($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            echo
            "<script>alert('Login Successfully!');
             window.location.href='dashboard.php';</script>";
        }
        else{
            echo
            "<script>alert('Wrong Password!');</script>";
        }
    }

    else{
        "<script>alert('User does not exist!');</script>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PABUHAT FITNESS GYM </title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <main>
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form action="#" method="post">
                    <h1>Sign in</h1>
                    <input type="text" name="email" id="email" placeholder="Email" required/>
                    <input type="password" name="password" id="password" placeholder="Password" required/>
                    <p id="show-btn">Show your password</p>
                    <a href="#">Forgot your password?</a>
                    <button type="submit" name="submit" id="submit">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                    <img src="img/logo1.png" alt="Pabuhat Fitness Gym" width="200">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us. Don't have an account?</p>
                        <a href="register.php"><button class="ghost" id="signUp">Sign Up</button></a>
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

        show.addEventListener("click", () => {
            if (password.type === "password") {
                password.type = "text";
                show.innerText = "Hide your password";
            } else {
                password.type = "password";
                show.innerText = "Show your password";
            }
        })
    </script>
</body>
</html>
