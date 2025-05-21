<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "equipment";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$Brand = $_POST['Brand'];
$Model = $_POST['Model'];
$Status = $_POST['Status'];
$Location = $_POST['Location'];
$Notes = $_POST['Notes'];

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO network_devices (Brand, Model, Status, Location, Notes) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $Brand, $Model, $Status, $Location, $Notes);

if ($stmt->execute()) {
    // Redirect user to device page
    header("Location: devices.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>