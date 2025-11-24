<?php
include 'config.php';

$result = $conn->query("SELECT username, review_text, rating, created_at FROM reviews ORDER BY created_at DESC");

$reviews = [];

while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

echo json_encode($reviews);
?>