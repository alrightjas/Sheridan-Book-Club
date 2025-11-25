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

$stmt = $conn->prepare("
    UPDATE user_books 
    SET status = 'completed', completed_at = NOW() 
    WHERE username = ? AND book_title = ? AND status = 'current'
");
$stmt->bind_param("ss", $username, $book_title);
$stmt->execute();
$stmt->close();

$stmt = $conn->prepare("
    UPDATE reading_goals 
    SET completed = completed + 1 
    WHERE username = ?
");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->close();

$conn->close();
echo json_encode(['success' => true]);
?>
