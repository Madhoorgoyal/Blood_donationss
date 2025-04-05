<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "<script>alert('Connection failed: " . $conn->connect_error . "');</script>";
    exit();
}


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$blood_type = $_POST['blood-type'];
$hospital_name = $_POST['hospital-name'];
$reason = $_POST['reason'];
$preferred_date = $_POST['preferred-date'];


$sql = "INSERT INTO requests (name, email, phone, gender, age, blood_type, hospital_name, reason, preferred_date) 
        VALUES ('$name', '$email', '$phone', '$gender', '$age', '$blood_type', '$hospital_name', '$reason', '$preferred_date')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Request submitted successfully!'); window.location.href='index.php';</script>";
    exit();
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='request-blood.php';</script>";
    exit();
}

mysqli_close($conn);
?>
