<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $return = $_POST['return'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $trip_type = $_POST['trip_type'];

    $sql = "INSERT INTO bookings (user_id, destination, departure_date, return_date, adults, children, trip_type) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssiis", $user_id, $destination, $departure, $return, $adults, $children, $trip_type);

    if ($stmt->execute()) {
        echo "Booking successful!";
        // Redirect to a booking confirmation page
        header("Location: booking_confirmation.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>