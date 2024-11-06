</main>

<footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>About MyTravo</h3>
            <p>MyTravo is your ultimate travel companion, offering personalized itineraries, best deals, and 24/7 support for unforgettable adventures.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="destinations.php">Destinations</a></li>
                <li><a href="booking.php">Book Now</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Connect With Us</h3>
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="footer-section">
            <h3>Newsletter</h3>
            <form action="newsletter_signup.php" method="POST" class="newsletter-form">
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                <button type="submit" class="btn">Subscribe</button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 MyTravo. All rights reserved.</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>