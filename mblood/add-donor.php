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
    <title>Add Donor</title>
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

        .form-container {
           width:600px;
         margin: 0 auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px black;
            border-radius: 8px;
			
        }

        .form-container h2 {
            text-align: center;
            color: #b71c1c;
        }

        .form-container label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-container input, .form-container select, .form-container textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: 0.3s;
        }

        .form-container input:hover, .form-container select:hover, .form-container textarea:hover {
            border-color: #b71c1c;
            box-shadow: 0 0 5px rgba(183, 28, 28, 0.5);
        }

        .form-container button {
            background: #b71c1c;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            transition: background 0.3s;
        }

        .form-container button:hover {
            background: #ffeb3b;
            color: #b71c1c;
        }
    </style>
</head>
<body>
    <main>
        <div class="form-container">
            <h2>Add Donor</h2>
            <form action="process-add-donor.php" method="post">
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

                <label for="blood-type">Blood Type</label>
                <select id="blood-type" name="blood-type" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>

                <label for="last-donation-date">Last Donation Date</label>
                <input type="date" id="last-donation-date" name="last-donation-date" required>

                <label for="preferred-date">Preferred Donation Date</label>
                <input type="date" id="preferred-date" name="preferred-date" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" placeholder="Any additional information or questions..."></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </main>
</body>
</html>
