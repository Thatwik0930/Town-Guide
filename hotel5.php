<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Details</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #3498db;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-right: 20px;
        }

        .header-right a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            background-color: #2980b9;
        }

        .centered-content {
            padding: 20px;
            color: #34495e;
            max-width: 1000px;
            margin: 0 auto;
        }

        .hotel-info {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hotel-image img {
            width: 100%; /* Make the image responsive */
            height: 100%;
            object-fit: cover;
        }

        .hotel-details {
            flex: 1;
            padding: 20px;
        }

        h2 {
            color: #3498db;
        }

        .ratings {
            color: #f39c12;
            font-weight: bold;
        }

        .price {
            color: #2ecc71;
            font-size: 1.2em;
            margin-top: 10px;
        }

        .amenities {
            background-color: #ecf0f1;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .amenity {
            background-color: #3498db;
            color: white;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            display: inline-block;
        }

        .booking-options {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .check-in-out,
        .check-out,
        .guests {
            flex: 1;
            min-width: 180px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #3498db;
        }

        .rooms-available {
            flex: 1;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #3498db;
        }

        .book-button {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .map {
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px;
}


        .reviews {
            margin-top: 20px;
        }

        .review {
            border: 1px solid #ecf0f1;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        footer {
        background-color: #3498db;
        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-left">
            <span class="logo">Town Guide</span>
        </div>
        <div class="header-right">
            <!-- ... (existing user login/signup logic) ... -->
            <?php
            if (isset($_SESSION['username'])) {
                echo '<span class="username">Welcome, ' . $_SESSION['username'] . '!</span>';
            } else {
                echo '<a href="#" class="signup-login-link">Sign Up/Login</a>';
            }
            ?>
        </div>
    </header>

    <main class="centered-content">
        <div class="hotel-info">
            <div class="hotel-image">
                <img src="manorama-hotel4.jpg" alt="Hotel 3">
            </div>
            <div class="hotel-details">
                <h2>Manorama Hotel</h2>
                <p>M.G. Road, near Old Bus Stand Governorpet, Vijayawada 520002 India</p>
                <div class="ratings">Ratings: 4.0</div>
                <div class="price">Rs.3000 per night</div>
            </div>
        </div>

        <div class="amenities">
            <h3>Amenities</h3>
            <div class="amenity">Free parking</div>
            <div class="amenity">WIFI</div>
            <div class="amenity">indoor Pool</div>
            <div class="amenity">coffee shop</div>
            <div class="amenity">Fitness classes</div>
            <div class="amenity">Room service</div>
            <div class="amenity">Free breakfast</div>
            <div class="amenity">Meeting Rooms</div>
        </div>

        <div class="booking-options">
            <div class="check-in-out">
                <label for="check-in">Check In:</label>
                <input type="date" id="check-in" onchange="updateRoomsAvailable()">
            </div>

            <div class="check-out">
                <label for="check-out">Check Out:</label>
                <input type="date" id="check-out" onchange="updateRoomsAvailable()">
            </div>

            <div class="guests">
                <label for="guests">Number of Guests:</label>
                <select id="guests" onchange="updateRoomsAvailable()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="rooms-available" id="rooms-available">Rooms Available: N/A</div>

            <button class="book-button" onclick="openBookingPage()">Book</button>
        </div>

        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.2944157735224!2d80.61757487490259!3d16.51122762745429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35f01d683dd707%3A0xb03dbde45f9473b7!2sHotel%20Manorama!5e0!3m2!1sen!2sin!4v1700084868301!5m2!1sen!2sin" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="reviews">
            <div class="review">
                <h3>Reviews</h3>
                <h3>Kusuma</h3>
                <p>I got experience in hotel manorama it is in heart of the city and services is excellent by mr.daveraj and gowri team was good . Rooms was maintained well and suggested to my frnds and family members. Thank u team manorama.</p>
            </div>
            <div class="review">
                <h3>Lokesh</h3>
                <p>We as foreigners went to Aruna Restaurante and we were searching for best choice in the mean time Me.Nazeer khan noticed us and recommended verybgood quality breakfast with his great abiliry of service</p>
            </div>
        </div>
    </main>

    <script>
        function updateRoomsAvailable() {
            const guests = parseInt(document.getElementById("guests").value);
            const checkInDate = new Date(document.getElementById("check-in").value);
            const checkOutDate = new Date(document.getElementById("check-out").value);

            if (!isNaN(guests) && checkInDate <= checkOutDate) {
                // Calculate available rooms (a simple random calculation for demonstration)
                const availableRooms = Math.floor(Math.random() * 10) + 1; // Adjust the range as needed
                document.getElementById("rooms-available").textContent = `Rooms Available: ${availableRooms}`;
            } else {
                document.getElementById("rooms-available").textContent = `Rooms Available: N/A`;
            }
        }

        function openBookingPage() {
            // You can replace this with your actual booking page URL
            window.location.href = "booking.html";
        }
    </script>
    <footer>
    &copy; 2023 Town Guide
  </footer>
</body>

</html>
