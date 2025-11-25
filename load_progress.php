<?php
session_start();
include 'config.php';

$username = $_GET['username'] ?? null;

if (!$username) {
    echo json_encode(['goal' => 0, 'completed' => 0]);
    exit;
}

$stmt = $conn->prepare("
    SELECT goal, completed 
    FROM reading_goals 
    WHERE username = ?
");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_assoc() ?: ['goal' => 0, 'completed' => 0];

echo json_encode($data);

$stmt->close();
$conn->close();
?>
