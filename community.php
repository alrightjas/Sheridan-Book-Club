<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book community!&#x2728;</title>
    <link rel="stylesheet" href="styles.css">
    <script src="communityscript.js" defer></script>
</head>
<body>
    <header>
        <h1><a href="index.html">Sheridan<br>Community</a></h1>
        <nav>
            <a href="index.html">Home</a>
            <a href="personal.html">Personal</a>
        </nav>
    </header>

    <main>
        
        <h2>Book Of The Week!</h2>
        <img src="img/bookoftheweek.jpg" alt="Book Cover" width="200" height="300">

        
        <section id="description">
            <h3>"The Midnight Library" by Matt Haig</h3>
            <p>
                Dive into the enchanting world of "The Midnight Library," where Nora Seed discovers a library that allows her to explore the infinite possibilities of her life. 
                Each book represents a different path she could have taken, offering a profound reflection on choices, regrets, and the pursuit of happiness. 
                Join Nora on her journey through alternate realities as she seeks to find the life that truly fulfills her.
            </p>
        </section>

        
        <section id="reviews">
            <h4>Community Reviews</h4>
            <div class="review-container" id="reviews-container">
                <p>Loading community reviews...</p>
            </div>
        </section>

        
        <section id="review-submission">
            <h5>Write Your Own Review!</h5>

            
            <div class="star-rate">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>

            <?php if (isset($_SESSION['username'])): ?>
            <div class="review-form">
                <textarea id="review-text" maxlength="650" placeholder="Write your review here..."></textarea>
                <div class="char-count">
                    <span id="current-count">0</span>/650 characters
                </div>
                <button id="submit-review">Submit Review</button>
            </div>

            <?php else: ?>
            <p>Please <a href="login.php">log in</a> to submit a review</p>
            <?php endif; ?>

            </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Group 8. All rights reserved.</p>
    </footer>
</body>
</html>
