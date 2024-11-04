<?php include 'header.php'; ?>

<section class="contact-hero">
    <h1>Get in Touch</h1>
    <p>We're here to help with any questions or concerns you may have</p>
</section>

<section class="contact-section">
    <div class="contact-container">
        <div class="contact-info">
            <h2>Contact Information</h2>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> 123 Travel Street, City, Country</li>
                <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                <li><i class="fas fa-envelope"></i> info@mytravo.com</li>
            </ul>
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="contact_process.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-full">Send Message</button>
            </form>
        </div>
    </div>
</section>

<section class="faq-section">
    <h2>Frequently Asked Questions</h2>
    <div class="faq-container">
        <div class="faq-item">
            <h3>How can I book a trip?</h3>
            <p>You can book a trip by using our online booking system on our website. Simply search for your desired destination and dates, and follow the booking process.</p>
        </div>
        <div class="faq-item">
            <h3>What payment methods do you accept?</h3>
            <p>We accept major credit cards, including Visa, MasterCard, and American Express. We also offer PayPal as a payment option for added convenience.</p>
        </div>
        <div class="faq-item">
            <h3>How can I change or cancel my reservation?</h3>
            <p>To change or cancel your reservation, please log in to your account and go to the "My Bookings" section. You can also contact our customer support team for assistance.</p>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>