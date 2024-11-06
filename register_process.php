<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('register.php');
}

// Verify CSRF token
if (!verify_csrf_token($_POST['csrf_token'])) {
    $_SESSION['error'] = "Invalid form submission.";
    redirect('register.php');
}

// Validate input
$username = sanitize_input($_POST['username']);
$email = sanitize_input($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validation
$errors = [];

if (strlen($username) < 3 || strlen($username) > 50) {
    $errors[] = "Username must be between 3 and 50 characters.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters long.";
}

if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    $errors[] = "Email already registered.";
}
$stmt->close();

// If there are errors, redirect back with error messages
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = ['username' => $username, 'email' => $email];
    redirect('register.php');
}

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Begin transaction
$conn->begin_transaction();

try {
    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);
    $stmt->execute();
    $user_id = $stmt->insert_id;
    $stmt->close();

    // Create user profile
    $stmt = $conn->prepare("INSERT INTO user_profiles (user_id) VALUES (?)");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    // Commit transaction
    $conn->commit();

    // Log the user in
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;

    // Clear any existing error messages
    unset($_SESSION['errors']);
    unset($_SESSION['form_data']);

    // Set success message
    $_SESSION['success'] = "Registration successful! Welcome to MyTravo.";
    
    // Redirect to homepage
    redirect('index.php');

} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    
    error_log($e->getMessage());
    $_SESSION['error'] = "Registration failed. Please try again later.";
    redirect('register.php');
}
?>