<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

include 'users_db_config.php';

$active_units = $conn->query("SELECT COUNT(*) FROM system_units WHERE status='active'")->fetch_row()[0];
$inactive_units = $conn->query("SELECT COUNT(*) FROM system_units WHERE status='inactive'")->fetch_row()[0];
$maintenance_units = $conn->query("SELECT COUNT(*) FROM system_units WHERE status='maintenance'")->fetch_row()[0];

$active_peripherals = $conn->query("SELECT COUNT(*) FROM peripherals WHERE status='active'")->fetch_row()[0];
$inactive_peripherals = $conn->query("SELECT COUNT(*) FROM peripherals WHERE status='inactive'")->fetch_row()[0];
$maintenance_peripherals = $conn->query("SELECT COUNT(*) FROM peripherals WHERE status='maintenance'")->fetch_row()[0];

$active_peripherals = $conn->query("SELECT COUNT(*) FROM network_devices WHERE status='active'")->fetch_row()[0];
$inactive_peripherals = $conn->query("SELECT COUNT(*) FROM network_devices WHERE status='inactive'")->fetch_row()[0];
$maintenance_peripherals = $conn->query("SELECT COUNT(*) FROM network_devices WHERE status='maintenance'")->fetch_row()[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>TrackIT</h1>
        </div>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="devices.html">Devices</a></li>
            <li><a href="locations.html">Schools</a></li>
            <li><a href="users.php">Users</a></li>
        </ul>
    <div class="container">
        <div class="header">
            <div class="nav">
                <a href="logout.php" class="logout">
                    <button type="button">Logout</button>
                </a>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>System Units</h1>
                        <p>Total Active: <?php echo $active_units; ?></p>
                        <p>Total Inactive: <?php echo $inactive_units; ?></p>
                        <p>In Maintenance: <?php echo $maintenance_units; ?></p>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>Peripherals</h1>
                        <p>Total Active: <?php echo $active_peripherals; ?></p>
                        <p>Total Inactive: <?php echo $inactive_peripherals; ?></p>
                        <p>In Maintenance: <?php echo $maintenance_peripherals; ?></p>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>Networking Devices</h1>
                        <p>Total Active: </p>
                        <p>Total Inactive: </p>
                        <p>In Maintenance: </p>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>