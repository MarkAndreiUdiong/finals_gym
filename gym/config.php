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
        echo "<script>alert('Database Connected Successfully!')</script>";
    }
    
?>