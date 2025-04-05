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

$id = $_POST['id'];


$sql = "SELECT * FROM feedback WHERE id=$id";


    if (mysqli_query($conn, $sql)) {

        $sql = "DELETE FROM feedback WHERE id=$id";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Rating deleted successfully'); window.top.location.href= 'admin-dashboard.php';</script>";
        } else {
            echo "<script>alert('Error deleting rating: " . mysqli_error($conn) . "'); window.top.location.href = 'admin-dashboard.php';</script>";
        }
    } 


mysqli_close($conn);
?>
