<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

// Create a connection using procedural MySQLi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    echo "<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>";
    exit();
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$blood_type = $_POST['blood-type'];
$last_donation_date = $_POST['last-donation-date'];
$preferred_date = $_POST['preferred-date'];
$message = $_POST['message'];

// Prepare SQL query
$sql = "INSERT INTO donations (name, email, phone, gender, age, blood_type, last_donation_date, preferred_date, message) 
        VALUES ('$name', '$email', '$phone', '$gender', '$age', '$blood_type', '$last_donation_date', '$preferred_date', '$message')";

// Execute query
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Donation request submitted successfully!'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='index.php';</script>";
}

// Close the connection
mysqli_close($conn);
?>
