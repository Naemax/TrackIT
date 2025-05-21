<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Loctations</title>

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
    <h1><b>Locations</b></h1>
    <br>
    <table class="table">
        <thread>
            <tr>
                <th>location_name</th>
                <th>district</th>
                <th>address</th>
                <th>PIC</th>
                <th>Phone Number</th>
                <th>email</th>
                <th>Status</th>
                <th>Total Systems</th>
                <th>Notes</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thread>
        <tbody>
            <?php
                include 'nw_db_config.php';
                $sql = "SELECT * FROM locations";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['location_name'] . "</td>";
                        echo "<td>" . $row['district'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['pic'] . "</td>";
                        echo "<td>" . $row['phone_number'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['total_systems'] . "</td>";;
                        echo "<td>" . $row['Notes'] . "</td>";
                        echo "<td><a href='edit_location.php?id=" . $row['location_name'] . "'>Edit</a></td>";
                        echo "<td><a href='delete_location.php?id=" . $row['location_name'] . "'>Delete</a></td>";
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