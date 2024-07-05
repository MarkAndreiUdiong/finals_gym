<?php
session_start();

$server = "localhost";
$user = "root";
$password = "";
$databaseName = "gym";

$conn = mysqli_connect($server, $user, $password, $databaseName);


$id = $_GET["id"];
$sql = "DELETE FROM `schedule` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  echo"<script>alert('Delete Successfully!'); 
                     window.location.href='dashboard.php';</script>";
} else {
  echo "Failed: " . mysqli_error($conn);
}