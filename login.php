<?php include 'header.php'; ?>

<section class="auth-section">
    <div class="auth-container">
        <div class="auth-tabs">
            <button class="auth-tab active" data-tab="login">Login</button>
            <button class="auth-tab" data-tab="register">Register</button>
        </div>
        <div class="auth-content" id="login">
            <h2>Welcome Back!</h2>
            <form action="login_process.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" value="1">
                        Remember me
                    </label>
                </div>
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
        </div>
        <div class="auth-content hidden" id="register">
            <h2>Create an Account</h2>
            <form action="register_process.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="register-name">Full Name</label>
                    <input type="text" id="register-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="register-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="register-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="register-confirm-password">Confirm Password</label>
                    <input type="password" id="register-confirm-password" name="confirm_password" required>
                </div>
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="terms" required>
                        I agree to the <a href="terms.php">Terms and Conditions</a>
                    </label>
                </div>
                <button type="submit" class="btn btn-full">Register</button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>