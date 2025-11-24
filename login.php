<?php
session_start();
include 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: community.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login!&#x2728;</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="loginscript.js" defer></script>
</head>
<body>
    <h1>Login Here!</h1>
    <main>
    <form id="form" action="login.php" method="post">
    
        <div class="form-control">
            <label for="userid">User ID: </label>
            <input type="text" id="userid" name="userid">
            <div class="error" id="userid-error"></div>
        </div>
        <div class="form-control">
            <label for="pword">Password: </label>
            <input type="password" id="password" name="password">
            <div class="error" id="pword-error"></div>
        </div>

        <div class="register-here">
            <a href="registration.html">register here!</a>
        </div>

        <input type="submit" value="Login">
     </form>
        <script src="login-validation.js"></script>
</main>
</body>
</html>