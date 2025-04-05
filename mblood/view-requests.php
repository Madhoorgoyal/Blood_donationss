<?php
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
            box-sizing: border-box;
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

        .btn-container {
            display: flex;
            justify-content: space-around;
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Blood Type Needed</th>
                            <th>Hospital Name</th>
                            <th>Reason</th>
                            <th>Preferred Delivery Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                  <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "blood_donation");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, name, email, phone, gender, age, blood_type, hospital_name, reason, preferred_date, status FROM requests";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["blood_type"] . "</td>";
            echo "<td>" . $row["hospital_name"] . "</td>";
            echo "<td>" . $row["reason"] . "</td>";
            echo "<td>" . $row["preferred_date"] . "</td>";
            echo "<td class='btn-container'>";
            
            if ($row["status"] == "pending") {
                echo "<button class='btn' id='accept-" . $row["id"] . "' onclick='handleAction(\"accept\", " . $row["id"] . ");'>Accept</button>";
                echo "<button class='btn' id='reject-" . $row["id"] . "' onclick='handleAction(\"reject\", " . $row["id"] . ");'>Reject</button>";
            } else {
                echo "<span class='status' id='status-" . $row["id"] . "'>" . ucfirst($row["status"]) . "</span>";
            }

            echo "<form action='delete-request.php' method='post' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <button type='submit' class='btn'>Delete</button>
                  </form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No requests found.</td></tr>";
    }

    mysqli_close($conn);
    ?>
</tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        function handleAction(action, id) {
            var form = document.createElement('form');
            form.method = 'post';
            form.action = action == 'accept' ? 'accept-request.php' : 'reject-request.php';
            
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'id';
            input.value = id;
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
