<?php include 'header.php'; ?>

<section class="destinations-hero">
    <h1>Explore Our Destinations</h1>
    <p>Discover amazing places and plan your next adventure</p>
</section>

<section class="destinations-search">
    <form action="destinations.php" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search destinations..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit" class="btn">Search</button>
    </form>
</section>

<section class="destinations-grid">
    <?php
    // Sample destination data (replace with database query in production)
    $destinations = [
        ['name' => 'Paris', 'country' => 'France', 'image' => 'https://placehold.co/300x200?text=Paris'],
        ['name' => 'Tokyo', 'country' => 'Japan', 'image' => 'https://placehold.co/300x200?text=Tokyo'],
        ['name' => 'New York', 'country' => 'USA', 'image' => 'https://placehold.co/300x200?text=New+York'],
        ['name' => 'Bali', 'country' => 'Indonesia', 'image' => 'https://placehold.co/300x200?text=Bali'],
        ['name' => 'Rome', 'country' => 'Italy', 'image' => 'https://placehold.co/300x200?text=Rome'],
        ['name' => 'Sydney', 'country' => 'Australia', 'image' => 'https://placehold.co/300x200?text=Sydney'],
        ['name' => 'Barcelona', 'country' => 'Spain', 'image' => 'https://placehold.co/300x200?text=Barcelona'],
        ['name' => 'Dubai', 'country' => 'UAE', 'image' => 'https://placehold.co/300x200?text=Dubai'],
    ];

    foreach ($destinations as $destination):
    ?>
    <div class="destination-card">
        <img src="<?php echo $destination['image']; ?>" alt="<?php echo $destination['name']; ?>">
        <h3><?php echo $destination['name']; ?></h3>
        <p><?php echo $destination['country']; ?></p>
        <a href="destination-details.php?name=<?php echo urlencode($destination['name']); ?>" class="btn btn-outline">Explore</a>
    </div>
    <?php endforeach; ?>
</section>

<section class="featured-experiences">
    <h2>Featured Experiences</h2>
    <div class="experience-slider">
        <div class="experience-card">
            <img src="https://placehold.co/400x300?text=Food+Tour" alt="Food Tour">
            <h3>Culinary Adventures</h3>
            <p>Explore local cuisines and flavors</p>
        </div>
        <div class="experience-card">
            <img src="https://placehold.co/400x300?text=Hiking" alt="Hiking">
            <h3>Nature Trails</h3>
            <p>Discover breathtaking landscapes</p>
        </div>
        <div class="experience-card">
            <img src="https://placehold.co/400x300?text=Cultural+Tour" alt="Cultural Tour">
            <h3>Cultural Immersion</h3>
            <p>Experience local traditions and customs</p>
        </div>
    </div>
</section>

<section class="travel-inspiration">
    <h2>Travel Inspiration</h2>
    <div class="inspiration-grid">
        <div class="inspiration-card">
            <img src="https://placehold.co/300x200?text=Beach+Getaways" alt="Beach Getaways">
            <h3>Beach Getaways</h3>
            <a href="#" class="btn btn-text">Explore beaches</a>
        </div>
        <div class="inspiration-card">
            <img src="https://placehold.co/300x200?text=City+Breaks" alt="City Breaks">
            <h3>City Breaks</h3>
            <a href="#" class="btn btn-text">Discover cities</a>
        </div>
        <div class="inspiration-card">
            <img src="https://placehold.co/300x200?text=Adventure+Travel" alt="Adventure Travel">
            <h3>Adventure Travel</h3>
            <a href="#" class="btn btn-text">Find adventures</a>
        </div>
        <div class="inspiration-card">
            <img src="https://placehold.co/300x200?text=Luxury+Escapes" alt="Luxury Escapes">
            <h3>Luxury Escapes</h3>
            <a href="#" class="btn btn-text">Indulge in luxury</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>