<?php
include 'config.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $password = $_POST["pword"] ?? "";
    $password2 = $_POST["pword2"] ?? "";

   
    if (empty($email) || empty($username) || empty($firstname) || empty($lastname) || empty($password)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

   
    if ($password !== $password2) {
        echo json_encode(["success" => false, "message" => "Passwords do not match."]);
        exit;
    }

 
    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "Username already exists."]);
        exit;
    }


    $stmt = $conn->prepare("INSERT INTO users (email, username, firstname, lastname, password) VALUES (?, ?, ?, ?, ?)");
    $hashed = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bind_param("sssss", $email, $username, $firstname, $lastname, $hashed);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>
