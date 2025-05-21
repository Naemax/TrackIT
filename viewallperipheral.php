<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Peripherals</title>

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
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <a href="logout.php" class="logout">
                    <button type="button">Logout</button>
                </a>
            </div>
        </div>
        <div class="cards">
    <h1><b>Peripherals</b></h1>
    <br>
    <table class="table">
        <thread>
            <tr>
                <th>Device ID</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Serial Number</th>
                <th>Status</th>
                <th>Location</th>
                <th>Notes</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thread>
        <tbody>
            <?php
                include 'nw_db_config.php';
                $sql = "SELECT * FROM peripherals";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['device_id'] . "</td>";
                        echo "<td>" . $row['type'] . "</td>";
                        echo "<td>" . $row['brand'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['serialNum'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['notes'] . "</td>";
                        echo "<td><a href='edit_peripheral.php?id=" . $row['device_id'] . "'>Edit</a></td>";
                        echo "<td><a href='delete_peripheral.php?id=" . $row['device_id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
    </div>
    
</body>
</html>