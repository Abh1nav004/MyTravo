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
        ['name' => 'Paris', 'country' => 'France', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Paris_Night.jpg/1920px-Paris_Night.jpg'],
        ['name' => 'Tokyo', 'country' => 'Japan', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Tokyo_Shibuya_Scramble_Crossing_2018-10-09.jpg/1920px-Tokyo_Shibuya_Scramble_Crossing_2018-10-09.jpg'],
        ['name' => 'New York', 'country' => 'USA', 'image' => 'https://media.architecturaldigest.com/photos/5da74823d599ec0008227ea8/16:9/w_2560%2Cc_limit/GettyImages-946087016.jpg'],
        ['name' => 'Bali', 'country' => 'Indonesia', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Bali%27s_Gunung_Agung_seen_at_sunset_from_Gunung_Rinjani.jpg/330px-Bali%27s_Gunung_Agung_seen_at_sunset_from_Gunung_Rinjani.jpg'],
        ['name' => 'Rome', 'country' => 'Italy', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Rome_skyline_panorama.jpg/417px-Rome_skyline_panorama.jpg'],
        ['name' => 'Sydney', 'country' => 'Australia', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Sydney_Opera_House_and_Harbour_Bridge_Dusk_%282%29_2019-06-21.jpg/402px-Sydney_Opera_House_and_Harbour_Bridge_Dusk_%282%29_2019-06-21.jpg'],
        ['name' => 'Barcelona', 'country' => 'Spain', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Aerial_view_of_Barcelona%2C_Spain_%2851227309370%29_%28cropped%29.jpg/1920px-Aerial_view_of_Barcelona%2C_Spain_%2851227309370%29_%28cropped%29.jpg'],
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