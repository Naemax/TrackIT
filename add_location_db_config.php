<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "equipment";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$location_name = $_POST['location_name'];
$district = $_POST['district'];
$address = $_POST['address'];
$pic = $_POST['pic'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$Status = $_POST['Status'];
$total_systems = $_POST['total_systems'];
$Notes = $_POST['Notes'];

$stmt = $conn->prepare("INSERT INTO locations (location_name, district, address, pic, phone_number, email, Status, total_systems, Notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $location_name, $district, $address, $pic, $phone_number, $email, $Status, $total_systems, $Notes);

if ($stmt->execute()) {

    header("Location: devices.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>