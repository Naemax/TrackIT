<?php
include 'nw_db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM network_devices WHERE device_id = '$id'");
}

header("Location: viewallnetwork.php");
exit();
?>