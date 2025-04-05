<!DOCTYPE html>
<?php  
session_start();
$conn = mysqli_connect("localhost", "root", "", "blood_donation");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT COUNT(name) AS total_donations FROM donations";
$result = mysqli_query($conn, $sql);
$total = $result ? mysqli_fetch_assoc($result)["total_donations"] : 0;

$sql = "SELECT COUNT(name) AS total_requests FROM requests";
$result = mysqli_query($conn, $sql);
$total2 = $result ? mysqli_fetch_assoc($result)["total_requests"] : 0;
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>About - Blood Donation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 85%;
            margin: auto;
            text-align: center;
            padding: 20px;
        }
        .stats {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 30px;
        }
        .stat-box {
            background: linear-gradient(45deg, #d63031, #c0392b);
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 280px;
            font-size: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .about-section {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        .about-item {
            background: #40739e;
            color: white;
            padding: 30px;
            border-radius: 10px;
            font-size: 24px;
            text-align: center;
        }
        .about-item:nth-child(even) {
            background: #44bd32;
        }
        h2 {
            color: #e74c3c;
            text-transform: uppercase;
            font-size: 28px;
        }
        .donation-types, .learn-about {
            margin: 25px 0;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .donation-box {
            background: #fdcb6e;
            padding: 15px;
            margin: 15px 0;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .compatibility-section {
            display: flex;
            margin-top: 40px;
            align-items: center;
			justify-content:space-evenly;
            gap: 20px;
        }
        .compatibility-image {
            width: 40%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .blood-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .blood-table th, .blood-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        .blood-table th {
            background: #d63031;
            color: white;
        }
        .blood-table td {
            background: #f4f4f9;
        }
    </style>
</head>
<body>
    <?php include("nav.html"); ?>
    <div class="container">
        <h1>About Blood Donation</h1>
        <div class="stats">
            <div class="stat-box">
                <p><?php echo $total; ?></p>
                <p>Total Donors</p>
            </div>
            <div class="stat-box">
                <p><?php echo $total2; ?></p>
                <p>Total Requests</p>
            </div>
        </div>
        <div class="about-section">
            <div class="about-item">Blood Donation</div>
            <div class="about-item">Blood Availability Search</div>
            <div class="about-item">Blood Request</div>
            <div class="about-item">Admin Panel</div>
        </div>
        <div class="learn-about">
            <h2>Learn About Donation</h2>
            <p>Donating blood regularly keeps your blood healthy and replenishes your system. It can help save lives and improve overall health.</p>
        </div>
        <div class="donation-types">
            <h2>Types of Donation</h2>
            <div class="donation-box">Packed Red Blood Cells - Used for severe anemia</div>
            <div class="donation-box">Plasma - Used for clotting disorders</div>
            <div class="donation-box">Platelet - Used for cancer treatments</div>
        </div>
        <div class="compatibility-section">
            <img src="images/bloodtable.png" alt="Blood table Chart" class="compatibility-image">
            <div>
                <h2>Blood Compatibility</h2>
                <table class="blood-table">
                    <tr>
                        <th>Blood Type</th>
                        <th>Donate To</th>
                        <th>Receive From</th>
                    </tr>
                    <tr>
                        <td>A+</td>
                        <td>A+, AB+</td>
                        <td>A+, A-, O+, O-</td>
                    </tr>
                    <tr>
                        <td>B+</td>
                        <td>B+, AB+</td>
                        <td>B+, B-, O+, O-</td>
                    </tr>
                    <tr>
                        <td>O+</td>
                        <td>O+, A+, B+, AB+</td>
                        <td>O+, O-</td>
                    </tr>
                    <tr>
                        <td>AB+</td>
                        <td>AB+</td>
                        <td>Everyone</td>
                    </tr>
                    <tr>
                        <td>A-</td>
                        <td>A+, A-, AB+, AB-</td>
                        <td>A-, O-</td>
                    </tr>
                    <tr>
                        <td>B-</td>
                        <td>B+, B-, AB+, AB-</td>
                        <td>B-, O-</td>
                    </tr>
                    <tr>
                        <td>AB-</td>
                        <td>AB+, AB-</td>
                        <td>AB-, A-, B-, O-</td>
                    </tr>
                    <tr>
                        <td>O-</td>
                        <td>Everyone</td>
                        <td>O-</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
	
	
	
<footer style="background-color: #333; color: white; text-align: center; padding: 20px;">
    
    <p style="font-size: 18px; font-weight: bold;">
        Developed by: Madhur Goyal, Aryan, Lakshdeep <br> 
        &copy; 2025 Blood Donation. All rights reserved.
    </p>
    
    <p>Contact us: <a href="mailto:madhoorgoyal@gmail.com" style="color: #ff5757; text-decoration: none;">madhoorgoyal@gmail.com</a></p>


    <div style="margin-top: 10px; font-size: 24px;">
        <a href="https://www.instagram.com/madhurgoyal2403" target="_blank" style="color: #E4405F; margin: 0 15px;">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/madhurgoyal" target="_blank" style="color: #1877F2; margin: 0 15px;">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="https://twitter.com/@MadhurG54915884" target="_blank" style="color: #1DA1F2; margin: 0 15px;">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/in/Madhur Goyal" target="_blank" style="color: #0A66C2; margin: 0 15px;">
            <i class="fab fa-linkedin"></i>
        </a>
    </div>

    <!-- Back to Top Button -->
    <div style="margin-top: 20px;">
        <button onclick="scrollToTop()" style="background-color: #ff5757; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
            Back to Top ↑
        </button>
    </div>
</footer>

<script>
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>

</body>
</html>
