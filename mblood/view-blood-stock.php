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

$sql = "SELECT blood_type, COUNT(*) AS total_donations FROM donations GROUP BY blood_type";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Donations</title>
    <style>
        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 1rem;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #b71c1c;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Total Donations by Blood Type</h2>
  <table>
    <tr>
        <th>Blood Type</th>
        <th>Total Donations</th>
  
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['blood_type'] . "</td>
                    <td>" . $row['total_donations'] . "</td>	
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No donation data available</td></tr>";
    }
    ?>
</table>

	
</body>
</html>
