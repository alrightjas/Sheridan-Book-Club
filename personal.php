<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Reading Dashboard</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Dancing+Script:wght@500;600&display=swap" rel="stylesheet">
    <script src="personalscript.js" defer></script>
</head>

<body>

    <div class="decor-left"></div>
    <div class="decor-right"></div>

<div class="personalContainer" data-username="<?= $username ?>">

<header>
    <h1>Welcome</h1>
    <h2><?= htmlspecialchars($username) ?>!</h2>

    <nav>
        <a href="index.php">Home</a>
        <a href="community.php">Community</a>
        <div id="authBtnContainer"></div>
    </nav>
</header>
<main>
    <div class = "content-wrapper">
    <section>
        <h2>Currently Reading</h2>

        <p id="currentReadSection">Title of Book</p>

        <form id="currentReadForm">
            <input type="text" id="currentReadInput" placeholder="Enter book title">
            <button type="submit">Set Current Book</button>
        </form>

        <button id="finishBookBtn">Finish Book</button>
    </section>

    <hr>

    <section>
        <h2>Completed Books</h2>
        <ul id="completedBooksList"></ul>
    </section>

    <hr>

    <section>
        <h2>Reading Goal</h2>

        <form id="readingGoalForm">
            <input type="number" id="readingGoalInput" placeholder="Enter reading goal">
            <button type="submit">Save Goal</button>
        </form>

        <div id="progressBar">
            <div class="progressFill"></div>
        </div>

        <p id="progressText">0 / 0 Completed</p>
    </section>

</div>
</main>
</body>
</html>
