<?php
require_once 'config.php';
require_login();

$user_id = $_SESSION['user_id'];

// Fetch user's bookings
$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - MyTravo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="container">
        <h1>My Bookings</h1>
        
        <?php if (empty($bookings)): ?>
            <p>You haven't made any bookings yet. <a href="booking.php">Book a trip now!</a></p>
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
                        <p>Booked on: <?php echo date('F j, Y', strtotime($booking['created_at'])); ?></p>
                        <a href="booking_details.php?id=<?php echo $booking['id']; ?>" class="btn btn-outline">View Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
</body>
</html>