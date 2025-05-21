<?php
include 'nw_db_config.php';

if (isset($_GET['location_name'])) {
    $location_name = $_GET['location_name'];
    mysqli_query($conn, "DELETE FROM locations WHERE location_name = '$location_name'");
}

header("Location: view_all_locations.php");
exit();
?>