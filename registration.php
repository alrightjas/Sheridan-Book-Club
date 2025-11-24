<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST["pword"] ?? "";
    $password2 = $_POST["pword2"] ?? "";

    if ($password !== $password2) {
        echo "Passwords do not match.";
        exit;
    }

    if (empty($username) || empty($email) || empty($firstname) || empty($lastname) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    $check = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose another.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (email, username, firstname, lastname, password) VALUES (?, ?, ?, ?, ?)");
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    $stmt->bind_param("sssss", $email, $username, $firstname, $lastname, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful!";
        $stmt->close();
        header("Location: login.html");
        exit();
    } else {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

}
$conn->close();
?>