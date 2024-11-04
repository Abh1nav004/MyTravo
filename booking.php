<?php include 'header.php'; ?>

<section class="booking-hero">
    <h1>Book Your Dream Vacation</h1>
    <p>Find and book your perfect getaway with ease</p>
</section>

<section class="booking-section">
    <div class="booking-container">
        <form action="booking_process.php" method="POST" class="booking-form">
            <div class="form-group">
                <label for="destination">Where do you want to go?</label>
                <input type="text" id="destination" name="destination" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="departure">Departure Date</label>
                    <input type="date" id="departure" name="departure" required>
                </div>
                <div class="form-group">
                    <label for="return">Return Date</label>
                    <input type="date" id="return" name="return" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="adults">Adults</label>
                    <select id="adults" name="adults" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="children">Children</label>
                    <select id="children" name="children">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4+</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="trip-type">Trip Type</label>
                <select id="trip-type" name="trip_type" required>
                    <option value="flight">Flight Only</option>
                    <option value="hotel">Hotel Only</option>
                    <option value="package">Flight + Hotel</option>
                    <option value="car">Car Rental</option>
                </select>
            </div>
            <button type="submit" class="btn btn-full">Search  Availability</button>
        </form>
    </div>
</section>

<section class="featured-deals">
    <h2>Featured Deals</h2>
    <div class="deal-grid">
        <div class="deal-card">
            <img src="https://placehold.co/300x200?text=Paris+Deal" alt="Paris Deal">
            <h3>Paris Getaway</h3>
            <p>3 nights + flights from $599</p>
            <a href="#" class="btn btn-outline">View Deal</a>
        </div>
        <div class="deal-card">
            <img src="https://placehold.co/300x200?text=Bali+Deal" alt="Bali Deal">
            <h3>Bali Beach Retreat</h3>
            <p>5 nights + flights from $899</p>
            <a href="#" class="btn btn-outline">View Deal</a>
        </div>
        <div class="deal-card">
            <img src="https://placehold.co/300x200?text=New+York+Deal" alt="New York Deal">
            <h3>New York City Break</h3>
            <p>4 nights + flights from $799</p>
            <a href="#" class="btn btn-outline">View Deal</a>
        </div>
    </div>
</section>

<section class="booking-faq">
    <h2>Frequently Asked Questions</h2>
    <div class="faq-container">
        <div class="faq-item">
            <h3>How do I book a trip?</h3>
            <p>Simply use our search form above to find available options for your desired destination and dates. Select the option that best suits your needs and follow the booking process.</p>
        </div>
        <div class="faq-item">
            <h3>Can I cancel or change my booking?</h3>
            <p>Cancellation and change policies vary depending on the type of booking and the provider. Please refer to the specific terms and conditions for your booking or contact our customer support for assistance.</p>
        </div>
        <div class="faq-item">
            <h3>Are there any hidden fees?</h3>
            <p>We strive for transparency in our pricing. All mandatory fees and taxes are included in the displayed price. Optional extras or resort fees may apply and will be clearly communicated during the booking process.</p>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>