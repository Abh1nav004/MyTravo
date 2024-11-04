<?php include 'header.php'; ?>



<section class="hero">
    <div class="hero-content">
        <h1>Discover Your Next Adventure</h1>
        <p>Explore the world with MyTravo - Your ultimate travel companion</p>
        <a href="booking.php" class="btn btn-large">Start Your Journey</a>
    </div>
</section>

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
        <div class="destination-card">
            <img src="https://placehold.co/300x200?text=Paris" alt="Paris">
            <h3>Paris, France</h3>
            <p>The City of Love</p>
            <a href="destinations.php?city=paris" class="btn btn-outline">Explore</a>
        </div>
        <div class="destination-card">
            <img src="https://placehold.co/300x200?text=Tokyo" alt="Tokyo">
            <h3>Tokyo, Japan</h3>
            <p>Where tradition meets future</p>
            <a href="destinations.php?city=tokyo" class="btn btn-outline">Explore</a>
        </div>
        <div class="destination-card">
            <img src="https://placehold.co/300x200?text=New+York" alt="New York">
            <h3>New York, USA</h3>
            <p>The city that never sleeps</p>
            <a href="destinations.php?city=new-york" class="btn btn-outline">Explore</a>
        </div>
        <div class="destination-card">
            <img src="https://placehold.co/300x200?text=Bali" alt="Bali">
            <h3>Bali, Indonesia</h3>
            <p>Island of the Gods</p>
            <a href="destinations.php?city=bali" class="btn btn-outline">Explore</a>
        </div>
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
    <a href="login.php#register" class="btn btn-large">Sign Up Now</a>
</section>

<?php include 'footer.php'; ?>