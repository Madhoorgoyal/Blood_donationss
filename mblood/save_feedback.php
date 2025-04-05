<?php
$conn = new mysqli("localhost", "root", "", "blood_donation");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$message = $_POST['message'];


$sql = "INSERT INTO feedback (name, email, rating, message) VALUES ('$name', '$email', '$rating', '$message')";


$result = mysqli_query($conn, $sql);

if ($result) {
    echo '<script>alert("Feedback submitted successfully!"); window.location="index.php";</script>';
} else {
    echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
}


mysqli_close($conn);
?>
