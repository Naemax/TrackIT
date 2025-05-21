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
$type = $_POST['type'];
$Brand = $_POST['Brand'];
$Model = $_POST['Model'];
$serialNum = $_POST['serialNum'];
$Status = $_POST['Status'];
$Location = $_POST['Location'];
$Notes = $_POST['Notes'];

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO peripherals (Type, Brand, Model, serialNum, Status, Location, Notes) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $type, $Brand, $Model, $serialNum, $Status, $Location, $Notes);

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