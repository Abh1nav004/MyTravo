<?php
require_once 'config.php';
include 'header.php';
?>

<section class="auth-section">
    <div class="auth-container">
        <h2>Welcome Back!</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error-message">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="login_process.php" method="POST" class="auth-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember" value="1">
                    Remember me
                </label>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
            <button type="submit" class="btn btn-full">Login</button>
        </form>
        <div class="auth-links">
            <a href="forgot-password.php">Forgot Password?</a>
        </div>
        <div class="social-login">
            <p>Or login with:</p>
            <div class="social-buttons">
                <button class="btn btn-social btn-facebook"><i class="fab fa-facebook"></i> Facebook</button>
                <button class="btn btn-social btn-google"><i class="fab fa-google"></i> Google</button>
            </div>
        </div>
        <p class="auth-switch">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</section>

<?php include 'footer.php'; ?>