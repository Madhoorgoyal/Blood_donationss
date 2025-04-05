<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requests</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
        }

        main {
            padding: 2rem;
        }

        .section {
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.8);
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            color: #b71c1c;
            text-align: center;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 0.5rem;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            background: #b71c1c;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
            margin: 0.5rem;
            text-align: center;
            display: inline-block;
        }

        .btn:hover {
            background: #ffeb3b;
            color: #b71c1c;
        }

        .status {
            font-weight: bold;
            color: #b71c1c;
        }
    </style>
</head>
<body>
    <main>
        <div class="section">
            <h2>Blood Requests</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rating</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                  <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "blood_donation");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, name, email, rating, message FROM feedback";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td>
                    <form action='delete-rating.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='btn'>Delete</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No ratings found.</td></tr>";
    }

    mysqli_close($conn);
    ?>
</tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
