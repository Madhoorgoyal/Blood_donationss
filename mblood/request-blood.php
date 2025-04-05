
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Blood</title>
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

        .form-container, .status-container {
            max-width: 600px;
            margin: 2rem auto 0;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-container h2, .status-container h2 {
            text-align: center;
            color: #b71c1c;
        }

        .form-container label, .status-container label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-container input, .form-container select, .form-container textarea, .status-container input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-container input:hover, .form-container select:hover, .form-container textarea:hover, .status-container input:hover {
            border-color: #b71c1c;
            box-shadow: 0 0 5px rgba(183, 28, 28, 0.5);
        }

        .form-container button, .status-container button, .check-status-button {
            background: #b71c1c;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            transition: background 0.3s;
            text-align: center;
        }

        .form-container button:hover, .status-container button:hover, .check-status-button:hover {
            background: #ffeb3b;
            color: #b71c1c;
        }

        .animated-heading {
            text-align: center;
			
            font-size: 2rem;
            color: #b71c1c;
            animation: slidein 2s forwards;
        }

        @keyframes slidein {
            from {
                transform: translatex(-50px);
                opacity: 0;
            }
            to {
                transform: translatex(0);
                opacity: 1;
            }
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            width: 300px;
            text-align: center;
        }

        .card h3 {
            margin: 0;
            color: #b71c1c;
        }

        .card p {
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <div class="">
     <?php
		require("nav.html");
		
		?>
		</div>
    <main>
        <div class="form-container">
            <h2>Select Blood Group</h2>
            <form method="get">
                <label for="blood-group">Blood Group</label>
                <select id="blood-group" name="blood-group" required>
                    <option value="select">Select blood group </option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
        <?php if (isset($_GET['blood-group'])): ?>
       	<div class="animated-heading" style="margin-bottom:10px;">Available Blood</div>
        <div class="card-container">
		
            <?php
$blood_group = $_GET['blood-group'];
$conn = mysqli_connect("localhost", "root", "", "blood_donation");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name, blood_type, preferred_date FROM donations WHERE blood_type = '$blood_group'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p>Blood Type: ' . $row["blood_type"] . '</p>';
        echo '<p>Donation Date: ' . $row["preferred_date"] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No blood donations available for this group.</p>';
}

mysqli_close($conn);
?>

        </div>
        <?php endif; ?>
        <div class="status-container">
            <button class="check-status-button" onclick="window.location.href='check-status.php'">Check Request Status</button>
        </div>
        <div class="form-container">
            <h2>Request Blood</h2>
            <form action="process-request.php" method="post">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="age">Age</label>
                <input type="number" id="age" name="age" required>

                <label for="blood-type">Blood Type Needed</label>
                <select id="blood-type" name="blood-type" required>
                    <option value="Select">Select blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>

                <label for="hospital-name">Hospital Name</label>
                <input type="text" id="hospital-name" name="hospital-name" required>

                <label for="reason">Reason for Request</label>
                               <textarea id="reason" name="reason" rows="4" placeholder="Please describe the reason for your request..." required></textarea>

                <label for="preferred-date">Preferred Delivery Date</label>
                <input type="date" id="preferred-date" name="preferred-date" required>

                <button type="submit">Submit</button>
            </form>
        </div>
    </main>
</body>
</html>
