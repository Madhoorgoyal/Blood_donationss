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


$sql = "SELECT name, email, phone, gender, age, blood_type, last_donation_date, preferred_date FROM donations WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $gender = $row['gender'];
    $age = $row['age'];
    $blood_type = $row['blood_type'];
    $last_donation_date = $row['last_donation_date'];
    $preferred_date = $row['preferred_date'];


    $sql = "INSERT INTO deleted_donors (name, email, phone, gender, age, blood_type, last_donation_date, preferred_date) 
            VALUES ('$name', '$email', '$phone', '$gender', '$age', '$blood_type', '$last_donation_date', '$preferred_date')";
    
    if (mysqli_query($conn, $sql)) {

        $sql = "DELETE FROM donations WHERE id=$id";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Donor deleted successfully and stored in archive.'); window.top.location.href= 'admin-dashboard.php';</script>";
        } else {
            echo "<script>alert('Error deleting donor: " . mysqli_error($conn) . "'); window.top.location.href = 'admin-dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Error archiving donor: " . mysqli_error($conn) . "'); window.location.href = 'admin-dashboard.php';</script>";
    }
} else {
    echo "<script>alert('Donor not found.'); window.location.href = 'admin-dashboard.php';</script>";
}


mysqli_close($conn);
?>
