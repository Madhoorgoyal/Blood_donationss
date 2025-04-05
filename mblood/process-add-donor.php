<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$blood_type = $_POST['blood-type'];
$last_donation_date = $_POST['last-donation-date'];
$preferred_date = $_POST['preferred-date'];
$message = $_POST['message'];


$sql = "INSERT INTO donations (name, email, phone, gender, age, blood_type, last_donation_date, preferred_date, message) 
        VALUES ('$name', '$email', '$phone', '$gender', '$age', '$blood_type', '$last_donation_date', '$preferred_date', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Donor added successfully'); window.top.location.href = 'admin-dashboard.php';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.top.location.href = 'admin-dashboard.php';</script>";
}


mysqli_close($conn);
?>
