<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "equipment";
$email = $_POST['email'];
$user_password = $_POST['user_password'];
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT user_password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    if (password_verify($user_password, $hashed_password)) {
        header("Location: devices.html");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid email.";
}

$stmt->close();
$conn->close();
?>