<?php
require_once 'config.php';
include 'header.php';

$isLoggedIn = is_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTravo - Your Travel Companion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h1>Discover Your Next Adventure</h1>
            <p>Explore the world with MyTravo - Your ultimate travel companion</p>
            <a href="booking.php" class="btn btn-large">Start Your Journey</a>
        </div>
    </section>

    <?php if ($isLoggedIn): ?>
    <section class="welcome-section">
        <div class="welcome-message">
            <?php
            $user = get_current_user();
            $welcomeName = $user && isset($user['email']) ? explode('@', $user['email'])[0] : 'Traveler';
            ?>
            <h2>Welcome back, <?php echo htmlspecialchars($welcomeName); ?>!</h2>
            <p>Start planning your next trip with us.</p>
        </div>
    </section>
    <?php endif; ?>

    <section class="search-bar">
        <form action="search_results.php" method="GET" class="search-form">
            <input type="text" name="destination" placeholder="Where do you want to go?" required>
            <input type="date" name="departure" required>
            <input type="date" name="return" required>
            <select name="travelers">
                <option value="1">1 Traveler</option>
                <option value="2">2 Travelers</option>
                <option value="3">3 Travelers</option>
                <option value="4">4+ Travelers</option>
            </select>
            <button type="submit" class="btn">Search</button>
        </form>
    </section>

    <section class="features">
        <div class="feature">
            <i class="fas fa-map-marked-alt"></i>
            <h3>Personalized Itineraries</h3>
            <p>Tailor-made travel plans to suit your preferences and budget.</p>
        </div>
        <div class="feature">
            <i class="fas fa-tags"></i>
            <h3>Best Deals</h3>
            <p>Exclusive discounts on flights, hotels, and activities.</p>
        </div>
        <div class="feature">
            <i class="fas fa-headset"></i>
            <h3>24/7 Support</h3>
            <p>Round-the-clock assistance for a worry-free travel experience.</p>
        </div>
    </section>

    <section class="popular-destinations">
        <h2>Popular Destinations</h2>
        <div class="destination-grid">
            <?php
            $stmt = $conn->prepare("SELECT * FROM destinations ORDER BY rating DESC LIMIT 4");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($destination = $result->fetch_assoc()):
            ?>
            <div class="destination-card">
                <img src="<?php echo htmlspecialchars($destination['image_url']); ?>" alt="<?php echo htmlspecialchars($destination['name']); ?>">
                <h3><?php echo htmlspecialchars($destination['name']); ?>, <?php echo htmlspecialchars($destination['country']); ?></h3>
                <p><?php echo htmlspecialchars($destination['description']); ?></p>
                <a href="destination.php?id=<?php echo $destination['id']; ?>" class="btn btn-outline">Explore</a>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Our Travelers Say</h2>
        <div class="testimonial-slider">
            <div class="testimonial">
                <p>"MyTravo made planning our honeymoon a breeze. The personalized itinerary was perfect!"</p>
                <cite>- Sarah & John</cite>
            </div>
            <div class="testimonial">
                <p>"I've never had such a smooth travel experience. The 24/7 support was a lifesaver!"</p>
                <cite>- Mike T.</cite>
            </div>
            <div class="testimonial">
                <p>"The deals I found through MyTravo saved me hundreds on my family vacation. Highly recommended!"</p>
                <cite>- Emily R.</cite>
            </div>
        </div>
    </section>

    <section class="cta">
        <h2>Ready to Start Your Adventure?</h2>
        <p>Sign up now and get exclusive access to our best deals and personalized travel recommendations!</p>
        <?php if ($isLoggedIn): ?>
            <a href="booking.php" class="btn btn-large">Book Your Trip</a>
        <?php else: ?>
            <a href="register.php" class="btn btn-large">Sign Up Now</a>
        <?php endif; ?>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>