<?php
include 'header.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mytravo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming user_id is 1 for now, you should replace this with the actual logged-in user ID
$user_id = 1;

$sql = "SELECT * FROM bookings WHERE user_id = $user_id";
$result = $conn->query($sql);

$bookings = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - MyTravo</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .book-another-trip {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }
        .book-another-trip:hover {
            background-color: #218838;
        }
        .bookings-list {
            margin-top: 20px;
        }
        .booking-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .booking-card h2 {
            margin-top: 0;
            color: #333;
        }
        .booking-card p {
            margin: 5px 0;
            color: #555;
        }
        .booking-card p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>My Bookings</h1>
        
        <a href="booking_process.php" class="book-another-trip">Book Another Trip</a>
        
        <?php if (empty($bookings)): ?>
            <p>You haven't made any bookings yet. <a href="booking_process.php">Book a trip now!</a></p>
        <?php else: ?>
            <div class="bookings-list">
                <?php foreach ($bookings as $booking): ?>
                    <div class="booking-card">
                        <h2><?php echo htmlspecialchars($booking['destination']); ?></h2>
                        <p>Departure: <?php echo htmlspecialchars($booking['departure_date']); ?></p>
                        <p>Return: <?php echo htmlspecialchars($booking['return_date']); ?></p>
                        <p>Adults: <?php echo htmlspecialchars($booking['adults']); ?></p>
                        <p>Children: <?php echo htmlspecialchars($booking['children']); ?></p>
                        <p>Trip Type: <?php echo htmlspecialchars($booking['trip_type']); ?></p>
                        <p>Status: <?php echo htmlspecialchars($booking['status']); ?></p>
                        <?php if ($booking['total_price']): ?>
                            <p>Total Price: $<?php echo number_format($booking['total_price'], 2); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>