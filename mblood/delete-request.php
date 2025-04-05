<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "blood_donation");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];

$sql = "DELETE FROM requests WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Request deleted successfully'); window.top.location.href = 'admin-dashboard.php';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.top.location.href = 'admin-dashboard.php';</script>";
}

mysqli_close($conn);
?>
