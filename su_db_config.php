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
$CPU = $_POST['CPU'];
$RAM = $_POST['RAM'];
$Storage = $_POST['Storage'];
$GPU = $_POST['GPU'];
$Motherboard = $_POST['Motherboard'];
$FormFactor = $_POST['FormFactor'];
$PSU = $_POST['PSU'];
$Tower = $_POST['Tower'];
$OS = $_POST['OS'];
$Status = $_POST['Status'];
$Location = $_POST['Location'];
$Notes = $_POST['Notes'];

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO system_units (CPU, RAM, Storage, GPU, Motherboard, FormFactor, PSU, Tower, OS, Status, Location, Notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $CPU, $RAM, $Storage, $GPU, $Motherboard, $FormFactor, $PSU, $Tower, $OS, $Status, $Location, $Notes);

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