<?php
// booking_process.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mytravo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = 1; // Replace this with the actual logged-in user ID
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $trip_type = $_POST['trip_type'];
    $status = 'pending';
    $total_price = $_POST['total_price'];

    $sql = "INSERT INTO bookings (user_id, destination, departure_date, return_date, adults, children, trip_type, status, total_price)
            VALUES ('$user_id', '$destination', '$departure_date', '$return_date', '$adults', '$children', '$trip_type', '$status', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "New booking created successfully. <a href='booking_process.php'>Make another booking</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Trip - MyTravo</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
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
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input, select, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .success-message {
            text-align: center;
            color: green;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>Book a Trip</h1>
        <?php if ($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form action="booking_process.php" method="POST">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required>

            <label for="departure_date">Departure Date:</label>
            <input type="date" id="departure_date" name="departure_date" required>

            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required>

            <label for="adults">Adults:</label>
            <input type="number" id="adults" name="adults" value="1" min="1" required>

            <label for="children">Children:</label>
            <input type="number" id="children" name="children" value="0" min="0" required>

            <label for="trip_type">Trip Type:</label>
            <select id="trip_type" name="trip_type" required>
                <option value="one-way">One-way</option>
                <option value="round-trip">Round-trip</option>
            </select>

            <label for="total_price">Total Price:</label>
            <input type="number" id="total_price" name="total_price" step="0.01" required>

            <button type="submit">Book Now</button>
        </form>
    </main>
</body>
</html>