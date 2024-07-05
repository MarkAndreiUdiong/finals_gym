<?php

session_start();
session_destroy();

echo
"<script>alert('Log Out Successfully!');
 window.location.href='login.php';</script>";

?>