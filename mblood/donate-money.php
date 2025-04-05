<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Money</title>
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
            text-align: center;
        }

        .qr-code {
            margin-top: 2rem;
        }

        .qr-code img {
            max-width: 200px;
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
        <h2>Donate Money</h2>
        <p>Scan the QR code below to make a donation and support our blood donation organization.</p>
        <div class="qr-code">
            <img src="images/qr.jpg" alt="Donate QR Code">
        </div>
    </main>
</body>
</html>
