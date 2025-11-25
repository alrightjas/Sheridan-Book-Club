<?php
session_start();
$loggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheridan Book Club ✨</title>

    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Dancing+Script:wght@500;600&display=swap" rel="stylesheet">

    <script>
        const loggedIn = <?php echo $loggedIn ? 'true' : 'false'; ?>;
    </script>
</head>

<body>

    <div class="decor-left"></div>
    <div class="decor-right"></div>

    <header>
        <h1>SHERIDAN</h1>
        <h2>Book Club!</h2>

        <nav>
            <a href="community.php">Community</a>
            <a href="personal.php" id="personalLink">Personal</a>
            </div>
        </nav>
    </header>

    <main class="section">
    <div class = "content-wrapper">
        <h2>About us</h2>
        <p>
            Welcome to the Sheridan Book Club! We are a community of book lovers who gather to share
            recommendations, reviews, and reading adventures. Whether you're into fiction, non-fiction,
            fantasy, romance, or anything in between — you'll find a welcoming space here!
        </p>

        <h3>Intro of Jas and Ishak!</h3>
        <p>
            Hey guys — thanks for visiting our page!  
            On the left is Jas De Jesus, and on the right is Ishak!  
            We’re excited to present the Sheridan Book Club Website to you!
        </p>

        <div style="display: flex; justify-content: center; gap: 50px; margin-top: 20px;">
            <div>
                <img src="img/jas.jpg" alt="Headshot of Jas" width="200" height="250" style="border-radius: 10px;">
            </div>

            <div>
                <img src="img/ishak.jpg" alt="Headshot of Ishak" width="200" height="250" style="border-radius: 10px;">
            </div>
        </div>

    </main>

    <footer>
        <p>&copy; 2025 Group 8. All rights reserved.</p>
    </footer>

    <script>

        document.addEventListener("DOMContentLoaded", () => {
            const personalLink = document.getElementById("personalLink");

            personalLink.addEventListener("click", (e) => {
                if (!loggedIn) {
                    e.preventDefault();
                    window.location.href = "login.php";
                }
            });
        });
    </script>
    </div>
</main>
</body>
</html>
