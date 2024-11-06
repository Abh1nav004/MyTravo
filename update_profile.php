<?php
require_once 'config.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!verify_csrf_token($_POST['csrf_token'])) {
        $_SESSION['error'] = "Invalid form submission.";
        redirect('user_profile.php');
    }

    $user_id = $_SESSION['user_id'];
    $first_name = sanitize_input($_POST['first_name']);
    $last_name = sanitize_input($_POST['last_name']);
    $phone = sanitize_input($_POST['phone']);
    $address = sanitize_input($_POST['address']);

    // Update user profile
    $stmt = $conn->prepare("INSERT INTO user_profiles (user_id, first_name, last_name, phone, address) 
                            VALUES (?, ?, ?, ?, ?) 
                            ON DUPLICATE KEY UPDATE 
                            first_name = VALUES(first_name), 
                            last_name = VALUES(last_name), 
                            phone = VALUES(phone), 
                            address = VALUES(address)");
    $stmt->bind_param("issss", $user_id, $first_name, $last_name, $phone, $address);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Profile updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update profile. Please try again.";
    }
    $stmt->close();
}

redirect('user_profile.php');
?>