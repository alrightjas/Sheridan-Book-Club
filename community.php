<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book community!&#x2728;</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Dancing+Script:wght@500;600&display=swap" rel="stylesheet">
    <script src="communityscript.js" defer></script>
</head>
<body>
    <div class="decor-left"></div>
<div class="decor-right"></div>

<header>
    <h1>SHERIDAN</h1>
    <h2>Community</h2>

    <nav>
        <a href="index.php">Home</a>
        <a href="personal.php">Personal</a>
    </nav>
</header>

<main class="section">
    <div class = "content-wrapper">
    <section class="book-of-week">
        <div class="book-frame">
            <img src="img/bookoftheweek.jpg" alt="Book Cover" width="200" height="300">
        </div>

        <div class="book-info">
            <h3>"Kingdom of Ash" by Sarah J. Maas</h3>
            <p> Aelin Galathynius has vowed to save her people ― but at a tremendous cost. Locked within an iron coffin by the Queen of the Fae, Aelin must draw upon her fiery will as she endures months of torture. The knowledge that yielding to Maeve will doom those she loves keeps her from breaking, but her resolve is unraveling with each passing day…
            With Aelin captured, friends and allies are scattered to different fates. Some bonds will grow even deeper, while others will be severed forever. As destinies weave together at last, all must fight if Erilea is to have any hope of salvation.
            Years in the making, Sarah J. Maas's New York Times bestselling Throne of Glass series draws to an explosive conclusion as Aelin fights to save herself―and the promise of a better world. </p>
        </div>
    </section>

    <h3>Community Reviews</h3>
    <div class="review-container" id="reviews-container">
        <p>Loading community reviews...</p>
    </div>

    <h3>Write Your Own Review!</h3>

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
        <div class="char-count"><span id="current-count">0</span>/650 characters</div>
        <button id="submit-review">Submit Review</button>
    </div>
    <?php else: ?>
    <p>Please <a href="login.php">log in</a> to submit a review</p>
    <?php endif; ?>
    </div>
</main>

<footer>
    <p>&copy; 2025 Group 8. All rights reserved.</p>
</footer>
</body>
</html>
