<?php
session_start();
include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? null;
$goal = $data['goal'] ?? null;

if (!$username || !$goal) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing username or goal']);
    exit;
}

$stmt = $conn->prepare("SELECT id FROM reading_goals WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $stmt = $conn->prepare("UPDATE reading_goals SET goal=? WHERE username=?");
    $stmt->bind_param("is", $goal, $username);
} else {
    
    $stmt = $conn->prepare("INSERT INTO reading_goals (username, goal, completed) VALUES (?, ?, 0)");
    $stmt->bind_param("si", $username, $goal);
}

echo json_encode(['success' => $stmt->execute()]);

$stmt->close();
$conn->close();
?>
