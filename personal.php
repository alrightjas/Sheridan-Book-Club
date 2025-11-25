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
    <link rel="stylesheet" href="styles.css">
    <script src="personalscript.js" defer></script>
</head>

<body>

<div class="personalContainer" data-username="<?= $username ?>">

    <h1>📚 Welcome, <?= htmlspecialchars($username) ?>!</h1>

    <nav>
                <a href="index.php">Home</a>
                <a href="community.php">Community</a>
                <div id="authBtnContainer">
                </div>
            </nav>

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

</body>
</html>
