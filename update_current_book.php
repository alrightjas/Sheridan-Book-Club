<?php
session_start();
include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? null;
$book_title = $data['book_title'] ?? null;

if (!$username || !$book_title) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing username or book_title']);
    exit;
}

$stmt = $conn->prepare("DELETE FROM user_books WHERE username=? AND status='current'");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->close();

$stmt = $conn->prepare("INSERT INTO user_books (username, book_title, status) VALUES (?, ?, 'current')");
$stmt->bind_param("ss", $username, $book_title);

echo json_encode(['success' => $stmt->execute()]);
$stmt->close();
$conn->close();
?>
