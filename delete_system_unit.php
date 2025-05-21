<?php
include 'nw_db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM system_units WHERE device_id = '$id'");
}

header("Location: viewallsystemunit.php");
exit();
?>