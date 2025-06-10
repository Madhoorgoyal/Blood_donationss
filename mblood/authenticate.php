<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";
$admin_username = "MadhurGoyal";
$admin_password = 123; 


if ($_POST['username'] == $admin_username && $_POST['password'] == $admin_password) {

    session_start();
    $_SESSION['loggedin'] = true;
    header("Location: admin-dashboard.php");
} else {
    echo "<script>alert('Invalid username or password'); window.location.href = 'login.html';</script>";
}
?>
