<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Request Status</title>
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

        .status-container {
            width: 630px;
			height:300px;
            margin: 2rem auto 0;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .status-container h2 {
            text-align: center;
            color: #b71c1c;
        }

        .status-container label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .status-container input ,select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .status-container input:hover {
            border-color: #b71c1c;
            box-shadow: 0 0 5px rgba(183, 28, 28, 0.5);
        }

        .status-container button {
            background: #b71c1c;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            transition: background 0.3s;
        }

        .status-container button:hover {
            background: #ffeb3b;
            color: #b71c1c;
        }
		p {
    position: absolute;
    top: 450px;
    left: 390px;
    font-size: 20px;  
    font-weight: bold; 
    color: #333; 
    text-shadow: 3px 3px 5px rgba(255, 255, 255, 0.7); 
    background: rgba(255, 255, 255, 0.3); 
    padding: 5px 10px; 
    border-radius: 5px;
}

    </style>
</head>
<body>
    <?php require("nav.html"); ?>
    <main>
        <div class="status-container">
            <h2>Check Request Status</h2>
            <form action="check-status.php" method="post">
                <label for="phone">Phone Number</label>
                <input type="number" id="phone" name="phone" required>

                <label for="blood-type">Blood Type</label>
                <select id="blood-type" name="blood-type" required>
                    <option value="select">Select blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <button type="submit">Check Status</button>
            </form>
   
   
   
   
   
   

        </div>
    </main>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "blood_donation");

    if (!$conn) {
        die("<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>");
    }

    $phone = $_POST['phone'];
    $blood_type = $_POST['blood-type'];

    $sql = "SELECT status FROM requests WHERE phone = '$phone' AND blood_type = '$blood_type'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "<p>Status: " . $row['status'] . "</p>";
    } else {
        echo "<p>No request found for the provided details.</p>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>
