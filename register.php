<?php
require_once 'config.php';
include 'header.php';
?>

<section class="auth-section">
    <div class="auth-container">
        <h2>Create an Account</h2>
        <?php
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo '<div class="error-message">' . htmlspecialchars($error) . '</div>';
            }
            unset($_SESSION['errors']);
        }
        ?>
        <form action="register_process.php" method="POST" class="auth-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required value="<?php echo isset($_SESSION['form_data']['username']) ? htmlspecialchars($_SESSION['form_data']['username']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="terms" required>
                    I agree to the <a href="terms.php">Terms and Conditions</a>
                </label>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
            <button type="submit" class="btn btn-full">Register</button>
        </form>
        <p class="auth-switch">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</section>

<?php
unset($_SESSION['form_data']);
include 'footer.php';
?>