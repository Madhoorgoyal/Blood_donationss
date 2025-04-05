<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation</title>

    <!-- for page animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 20px;
        }

        ::-webkit-scrollbar-thumb {
            background: red;
            border-radius: 7px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #b30000;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
            /* Hides horizontal scrollbar */
            overflow-y: auto;
            background: linear-gradient(to right, #ff4b2b, #ff416c);

        }

        #video-section {
            position: relative;
            width: 100%;
            height: auto;
            margin-bottom: -2px;


        }

        #video-section video {

            width: 100%;
            height: auto%;
            object-fit: cover;

        }

        #info {
            padding: 2rem;
            display: flex;
            justify-content: space-around;
            background: #e0f7fa;
        }

        #info .info-image {
            flex: 1;
            margin-right: 1rem;
        }

        #info .info-text {
            flex: 2;
            color: #004d40;
        }

        #info h2 {
            text-align: center;
            color: #00796b;
        }

        #info p {
            font-size: 1.2rem;
        }

        #info ul {
            list-style-type: disc;
            margin-left: 2rem;
        }

        #info ul li {
            margin: 1rem 0;
        }

        #about {
            padding: 2rem;
            text-align: center;
            background: #f5f5f5;
        }

        footer {
            background: #222;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        #content {

            //display:none;
        }

        .btn {
            background: linear-gradient(45deg, #ff4b2b, #ff416c);
            color: white;

            padding: 15px 30px;
            font-size: 40px;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            margin-left: 208px;
            margin-top: 100px;
            transition: 0.8s;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            transform: scale(1.1);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .btn2 {
            animation: glow 1.5s infinite;
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 10px #ff416c;
            }

            50% {
                box-shadow: 0 0 20px #ff4b2b, 0 0 40px #ff416c;
            }

            100% {
                box-shadow: 0 0 10px #ff416c;
            }
        }


        /*  Mobile Devices (Up to 600px) */
        @media (max-width: 600px) {
            #info {
                flex-direction: column;
                /* Stack elements vertically */
                padding: 1rem;
                text-align: center;
            }

            #info .info-image,
            #info .info-text {
                flex: 1;
                width: 100%;
                margin: 0;
            }

            #video-section video {
                height: auto;
                /* Maintain aspect ratio */
            }

            .btn {
                font-size: 24px;
                padding: 12px 20px;
                margin-left: 0;
                display: block;
                margin: 20px auto;
            }
        }

        .feedback-container {
            width: 52%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .feedback-container h2 {
            color: red;
        }

        input,
        textarea {
            width: 98%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .rating {
            direction: rtl;
            margin-right: 555px;

        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }

        .rating input:checked~label,
        .rating label:hover,
        .rating label:hover~label {
            color: gold;
        }

        button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: 1s;
        }

        button:hover {
            background-color: darkred;
            transform: scale(1.1);
        }
    </style>

</head>

<body>

    <div id="content">
        <?php require("nav.html"); ?>
        <main>
            <section id="video-section">
                <video autoplay muted loop>
                    <source src="videos/mainvideo.mp4" type="video/mp4">
                    Your browser does not support the video tag.
					</video>
            </section>
            <section id="info" style="background: linear-gradient(to right, #ff9a9e, #fad0c4);" data-aos="fade-out"
                data-aos-duration="2500">
                <div class="info-image" data-aos="fade-right" data-aos-duration="2500"> <img src="images/info-image.png"
                        alt="Blood Donation" style="width: 100%;"> </div>
                <div class="info-text" data-aos="fade-left" data-aos-duration="2500">
                    <h2>Who can donate ?</h2>
                    <p>Blood donation is a simple, safe process that saves lives. Anyone who is healthy, at least 17
                        years
                        old, and weighs at least 110 pounds may donate blood every 56 days. Here are some key points:
                    </p>
                    <ul>
                        <li>Blood donations help millions of patients in need.</li>
                        <li>The donation process is quick and easy.</li>
                        <li>Donors can donate whole blood, platelets, or plasma.</li>
                        <li>Regular blood donors are critical to maintaining an adequate blood supply.</li>
                    </ul>
                </div>
            </section>

            <section id="info" style="background: linear-gradient(to right, #ff6f61, #ff9472);" data-aos="fade-out"
                data-aos-duration="2500">
                <div class="info-text" data-aos="fade-right" data-aos-duration="2500">
                    <h2>Benefits of Blood Donation</h2>
                    <p>Blood donation is a selfless act that can save lives. Here are some benefits of donating blood:
                    </p>
                    <ul>
                        <li>It helps save lives by providing blood to those in need.</li>
                        <li>Donating blood can improve your cardiovascular health.</li>
                        <li>It can reduce the risk of cancer and other diseases.</li>
                        <li>Blood donation helps in maintaining a healthy iron level in your body.</li>
                        <li>It provides a sense of satisfaction and fulfillment, knowing that you have helped someone in
                            need.</li>
                    </ul>
                </div>

                <div class="info-image" data-aos="fade-left" data-aos-duration="2500">
                    <section id="video-section">
                        <video autoplay muted loop>
                            <source src="videos/q2.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </section>
                </div>
            </section>

            <section id="info" style="background: linear-gradient(to right, #ff7e5f, #feb47b);" data-aos="fade-out"
                data-aos-duration="2500">
                <div class="info-image" data-aos="fade-right" data-aos-duration="2500">
                    <section id="video-section" style="height:600px;">
                        <video autoplay muted loop>
                            <source src="videos/q6.mp4" type="video/mp4">
                            Your browser does not support the video tag.

                        </video>
                    </section>
                </div>
                <div class="info-text" data-aos="fade-left" data-aos-duration="2500">
                    <h2>Blood Donation Process</h2>
                    <p>The blood donation process is simple and safe. Here are the steps involved:</p>
                    <ul>
                        <li>Registration: You will need to provide some basic information and complete a health history
                            questionnaire.</li>
                        <li>Health Check: A healthcare professional will check your blood pressure, pulse, temperature,
                            and hemoglobin levels.</li>
                        <li>Donation: A sterile needle is used to collect blood from a vein in your arm. The process
                            takes about 10-15 minutes.</li>
                        <li>Refreshments: After donating, you will be given refreshments to help your body recover.</li>
                        <li>Rest: You may be asked to sit and relax for a few minutes before leaving the donation
                            center.</li>
                    </ul>
                    <a href="donate-blood.php"><button class="btn btn2">Donate Now</button>
                    </a>
                </div>

            </section>
            <a name="Feedback"></a>
            <div class="feedback-container" data-aos="zoom-out" data-aos-duration="1500">
                <h2>Give Your Feedback</h2>
                <form action="save_feedback.php" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>


                    <textarea name="message" placeholder="Your Feedback" rows="4" required></textarea>

                    <div class="rating">

                        <input type="radio" name="rating" id="star1" value="5"><label for="star1">★</label>
                        <input type="radio" name="rating" id="star2" value="4"><label for="star2">★</label>
                        <input type="radio" name="rating" id="star3" value="3"><label for="star3">★</label>
                        <input type="radio" name="rating" id="star4" value="2"><label for="star4">★</label>
                        <input type="radio" name="rating" id="star5" value="1"><label for="star5">★</label>
                    </div>
                    <button type="submit" style="margin-top:20px; margin-left:10px;">Submit Feedback</button>
                </form>
            </div>
            <section id="about" data-aos="zoom-in" data-aos-duration="1500">
                <h2>About Us</h2>
                <p>We are committed to saving lives through blood donations.</p>
            </section>
        </main>
        <a name="home"> </a>

        <footer style="background-color: #333; color: white; text-align: center; padding: 20px;">

            <p style="font-size: 18px; font-weight: bold;">
                Developed by: Madhur Goyal, Aryan, Lakshdeep <br>
                &copy; 2025 Blood Donation. All rights reserved.
            </p>

            <p>Contact us: <a href="mailto:madhoorgoyal@gmail.com"
                    style="color: #ff5757; text-decoration: none;">madhoorgoyal@gmail.com</a></p>


            <div style="margin-top: 10px; font-size: 24px;">
                <a href="https://www.instagram.com/madhurgoyal2403" target="_blank"
                    style="color: #E4405F; margin: 0 15px;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/madhurgoyal" target="_blank" style="color: #1877F2; margin: 0 15px;">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com/@MadhurG54915884" target="_blank" style="color: #1DA1F2; margin: 0 15px;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/in/Madhur Goyal" target="_blank"
                    style="color: #0A66C2; margin: 0 15px;">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>

            <!-- Back to Top Button -->
            <div style="margin-top: 20px;">
                <button onclick="scrollToTop()"
                    style="background-color: #ff5757; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                    Back to Top ↑
                </button>
            </div>
        </footer>

        <script>
            function scrollToTop() {
                window.scrollTo({ top: 0 });
            }
        </script>

    </div>

    <!-- for page animation -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        AOS.init(); 
    </script>

</body>

</html>