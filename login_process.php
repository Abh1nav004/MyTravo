<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('login.php');
}

// Verify CSRF token
if (!verify_csrf_token($_POST['csrf_token'])) {
    $_SESSION['error'] = "Invalid form submission.";
    redirect('login.php');
}

$email = sanitize_input($_POST['email']);
$password = $_POST['password'];
$remember = isset($_POST['remember']) ? true : false;

// Validate input
if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Please fill in all fields.";
    redirect('login.php');
}

// Get user by email
$stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Invalid email or password.";
    redirect('login.php');
}

$user = $result->fetch_assoc();
$stmt->close();

// Verify password
if (!password_verify($password, $user['password'])) {
    $_SESSION['error'] = "Invalid email or password.";
    redirect('login.php');
}

// Set session variables
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_email'] = $user['email'];

// Handle "Remember Me"
if ($remember) {
    $token = bin2hex(random_bytes(32));
    $expires = time() + (30 * 24 * 60 * 60); // 30 days
    
    // Store token in database
    $stmt = $conn->prepare("UPDATE users SET remember_token = ?, remember_expires = FROM_UNIXTIME(?) WHERE id = ?");
    $stmt->bind_param("sii", $token, $expires, $user['id']);
    $stmt->execute();
    $stmt->close();
    
    // Set cookie
    setcookie('remember_token', $token, $expires, '/', '', true, true);
}

// Clear any existing error messages
unset($_SESSION['error']);

// Redirect to intended page or homepage
$redirect = $_SESSION['redirect_after_login'] ?? 'index.php';
unset($_SESSION['redirect_after_login']);
redirect($redirect);
?>