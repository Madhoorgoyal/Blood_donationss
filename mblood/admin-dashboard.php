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
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
        }

        header {
            background: #b71c1c;
            color: #fff;
            padding: 1rem 0;
            box-shadow: 0 4px 2px -2px gray;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 1rem;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ffeb3b;
        }

        main {
            padding: 2rem;
            text-align: center;
        }

        .admin-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .admin-links a {
            background: #b71c1c;
            color: #fff;
            padding: 1rem 2rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .admin-links a:hover {
            background: #ffeb3b;
            color: #b71c1c;
        }

        iframe {
            width: 100%;
            height: 800px;
            border: none;
        }
		        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            padding: 15px;
            border-radius: 50px;
            font-size: 18px;
            text-decoration: none;
            display: flex;
            align-items: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .whatsapp-button img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Admin Dashboard</h2>
        <div class="admin-links">
            <a href="view-donors.php" target="iframe-content">View Donors</a>
            <a href="view-requests.php" target="iframe-content">View Requests</a>
			<a href="view-blood-stock.php" target="iframe-content">View Blood Stock</a>
			<a href="view-ratings.php" target="iframe-content">View Ratings</a>

            <a href="add-donor.php" target="iframe-content">Add Donor</a>
        </div>
        <iframe name="iframe-content"></iframe>
		
						 <!-- WhatsApp -->
		<a href="https://wa.me/9815658832?text=Please%20help%20me%20regarding%20to" class="whatsapp-button" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Logo">
        Contact us on WhatsApp
		</a>
    </main>
</body>
</html>
