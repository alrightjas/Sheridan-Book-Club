<?php
session_start();
include 'config.php';

$username = $_GET['username'] ?? null;

if (!$username) {
    echo json_encode([]);
    exit;
}

$stmt = $conn->prepare("SELECT book_title FROM user_books WHERE username=? AND status='completed'");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();
$books = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($books);

$stmt->close();
$conn->close();
?>
