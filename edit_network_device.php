<?php
include 'nw_db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM network_devices WHERE device_id = '$id'");
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['device_id'];
    $type = $_POST['type'];
    // ...get other fields...
    $sql = "UPDATE network_devices SET type='$type' WHERE device_id='$id'";
    // Add other fields to the update query as needed
    mysqli_query($conn, $sql);
    header("Location: viewallnetwork.php");
    exit();
}
?>

<form method="post">
    <input type="hidden" name="device_id" value="<?php echo $row['device_id']; ?>">
    Type: <input type="text" name="type" value="<?php echo $row['type']; ?>"><br>
    <!-- Add other fields here -->
    <button type="submit">Update</button>
</form>