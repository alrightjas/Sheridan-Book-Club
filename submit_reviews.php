<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo "Please log in to submit a review.";
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$review = $data['review'] ?? '';
$rating = $data['rating'] ?? null;
$username = $_SESSION['username'];

if (strlen($review) > 650) {
    http_response_code(400);
    echo "Review cannot exceed 650 characters.";
    exit();
}


$stmt = $conn->prepare("INSERT INTO reviews (username, review_text, rating) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $username, $review, $rating);

if ($stmt->execute()) {
    echo "Review submitted successfully.";
} else {
    http_response_code(500);
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
